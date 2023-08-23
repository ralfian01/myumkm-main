<?php

namespace App\API\Library;

use App\API\Library\WritingFormat;
use App\API\Library\FormDataParser;

/**
 * Class to process payload
 */
class Payload extends FormDataParser
{

    private $validationData = null;
    private $invalidPayloadFunc = null;
    private $validPayloadFunc = null;

    /**
     * Function to setup validation payload and rules
     * 
     * @param array $payload Payload to check
     * @param array|object $rules_or_file Payload rules or payload file
     * @param array $rules Payload rules
     * 
     * @return void
     */
    public function setValidationData(array $payload, $rules_or_file, array $rules = null)
    {

        // Check if $rules_or_file include file
        foreach ($rules_or_file as $key => $val) {
            if (is_array($rules_or_file[$key])) {
                foreach ($rules_or_file[$key] as $fKey => $fVal) {
                    if (method_exists($rules_or_file[$key][$fKey], 'getName')) $payload[$key][$fKey] = $rules_or_file[$key][$fKey];
                }
            } else {
                if (method_exists($rules_or_file[$key], 'getName')) $payload[$key] = $rules_or_file[$key];
            }
        }

        $this->validationData = [
            'payload' => $payload,
            'rules' => $rules ?? $rules_or_file
        ];

        return $this;
    }

    /**
     * Function to set callback when validation is success and pass callback parameter
     * 
     * @param function $function Callback function
     * 
     * @return void
     */
    public function validationSuccess($function)
    {

        $this->validPayloadFunc = $function;
        return $this;
    }

    /**
     * Function to set callback when validation is failed and pass callback parameter
     * 
     * @param function $function Callback function
     * 
     * @return void
     */
    public function validationFail($function)
    {

        $this->invalidPayloadFunc = $function;
        return $this;
    }

    /**
     * Function to validate payload
     * 
     * @return void
     */
    public function validate()
    {

        if ($this->validationData == null)
            return throw new \Error('You must set validation data using method setValidationData() before performing checks');

        $payload = $this->validationData['payload'];
        $rules = $this->validationData['rules'];

        $invalidPayloads = [];

        // Start check payload
        foreach ($rules as $key => $rules) {

            $reasons = [];

            foreach ($rules as $val) {

                $extract = $this->extractRuleValue($val);
                $extract->rule = "_" . strtoupper($extract->rule);

                if (method_exists($this, $extract->rule)) {

                    if ($extract->rule != '_REQUIRED') {

                        if (isset($payload[$key])) {

                            $check = $this->{$extract->rule}($payload[$key], $extract->value);
                            if (!$check->status) $reasons[] = $check->fail_detail;
                            if (isset($check->break) && $check->break) break;
                        }
                    } else {

                        $check = $this->_REQUIRED($payload, $key, $extract->value);
                        if (!$check->status) $reasons[] = $check->fail_detail;
                        if (isset($check->break) && $check->break) break;
                    }
                } else {

                    return throw new \Error("The method ({$extract->rule}) to validate the payload rules is not available.");
                }
            }

            if (count($reasons) >= 1)
                $invalidPayloads[] = [
                    'payload_name' => $key,
                    'reasons' => $reasons
                ];
        }

        if (
            count($invalidPayloads) >= 1
            && is_callable($this->invalidPayloadFunc)
        ) return call_user_func($this->invalidPayloadFunc, $invalidPayloads);

        if (is_callable($this->validPayloadFunc)) return call_user_func($this->validPayloadFunc);
    }

    /** 
     * Function to extract value from rule
     * 
     * @param string $rule
     * @return object
     */
    private function extractRuleValue(string $rule = '')
    {

        $match = explode("[", $rule);

        $extracted = new \stdClass();
        $extracted->value = isset($match[1]) ? substr($match[1], 0, -1) : '';
        $extracted->rule = $match[0];
        return $extracted;
    }

    /** 
     * @param array|object $payload Variable to check
     * @param string $key
     * @return object
     */
    private static function _REQUIRED(&$payload, $key)
    {

        $result = new \stdClass();
        $result->status = isset($payload[$key]) && $payload[$key] != null;
        $result->fail_detail = [
            'reason' => 'This payload needs to be filled',
            'expectation' => 'Not NULL'
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /**  
     * @param string $string String input
     * 
     * @return object
     */
    private static function _BASE64(string $string)
    {

        $result = new \stdClass();
        $result->status = WritingFormat::isBase64($string);
        $result->fail_detail = [
            'reason' => 'This payload must be encoded',
            'expectation' => 'Encode using BASE64 scheme'
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param string $string Date string input
     * 
     * @return object
     */
    private static function _DATE_8601(string $string)
    {

        $result = new \stdClass();
        $result->status = WritingFormat::isDate($string, WritingFormat::ISO8601);
        $result->fail_detail = [
            'reason' => 'This payload must be written using datetime standard writing',
            'expectation' => 'Datetime writing using ISO 8601 standard (YYYY-MM-DD\THH:ii:ss+00:00)',
            'example' => '2022-12-12T01:01:01+00:00'
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param string $string Date string input
     * 
     * @return object
     */
    private static function _DATE_YMD(string $string)
    {

        $result = new \stdClass();
        $result->status = WritingFormat::isDate($string, WritingFormat::HESOYAM);
        $result->fail_detail = [
            'reason' => 'This payload must be written using date standard writing',
            'expectation' => 'Datetime writing using Y-m-d standard (YYYY-MM-DD)',
            'example' => '2022-12-12'
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param string $string String email input
     * 
     * @return object
     */
    private static function _EMAIL(string $string)
    {

        $result = new \stdClass();
        $result->status = WritingFormat::isEmail($string);
        $result->fail_detail = [
            'reason' => 'This payload must be written using a valid email compose',
            'expectation' => 'None'
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param string $string String segment domain input
     * 
     * @return object
     */
    private static function _SEGMENT_DOMAIN(string $string)
    {

        $result = new \stdClass();
        $result->status = WritingFormat::isSegmentDomain($string);
        $result->fail_detail = [
            'reason' => 'This payload must be written using a valid segment domain write',
            'expectation' => 'Only accepts uppercase and lowercase letters, number, dash (-), and underscore (_)',
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /**  
     * @param mixed $int Integer input
     * 
     * @return object
     */
    private static function _INT(mixed $int)
    {

        $result = new \stdClass();
        $result->status = WritingFormat::isInt($int);
        $result->fail_detail = [
            'reason' => 'This payload must be integer',
            'expectation' => 'Only accepts integers'
        ];
        $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /**  
     * @param mixed $array Array input
     * 
     * @return object
     */
    private static function _ARRAY(mixed $array)
    {

        $result = new \stdClass();
        $result->status = WritingFormat::isArray($array);
        $result->fail_detail = [
            'reason' => 'This payload must be filled in an array format',
            'expectation' => 'Only accepts arrays'
        ];
        $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param string $string String input
     * @param int $length Max length of $string
     * @return object
     */
    private static function _MAXLENGTH(string $string, int $length = 0)
    {

        $result = new \stdClass();
        $result->status = strlen($string) <= $length;
        $result->fail_detail = [
            'reason' => "This payload exceeds the character length limit",
            'expectation' => "Character length must be less than or equal to {$length} characters",
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param string $string String input
     * @param int $length Min length of $string
     * @return object
     */
    private static function _MINLENGTH(string $string, int $length = 0)
    {

        $result = new \stdClass();
        $result->status = strlen($string) >= $length;
        $result->fail_detail = [
            'reason' => "This payload is less than the minimum character length",
            'expectation' => "Character length must be more than or equal to {$length} characters",
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param mixed $array Array input
     * @param int $length Max item of $array
     * @return object
     */
    private static function _MAXITEM(mixed $array, int $length = 1)
    {

        $result = new \stdClass();
        $result->status = is_array($array) ? count($array) <= $length : true;
        $result->fail_detail = [
            'reason' => "This payload exceeds the length limit of array items",
            'expectation' => "Array item must be less than or equal to {$length}",
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param array $array Array input
     * @param int $length Max item of $array
     * @return object
     */
    private static function _MINITEM(array $array, int $length = 1)
    {

        $result = new \stdClass();
        $result->status = count($array) >= $length;
        $result->fail_detail = [
            'reason' => "This payload is less than the minimum of array items",
            'expectation' => "Array item must be more than or equal to {$length}",
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param string $string String input
     * @param mixed $enums Enum
     * @return object
     */
    private static function _ENUM(string $string, $enums)
    {

        $result = new \stdClass();
        $result->status = in_array($string, preg_split('/[,, ]/', $enums));
        $result->fail_detail = [
            'reason' => "This payload accepts only one of the available enum options",
            'expectation' => "Select one of the enums ({$enums})",
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param array|object $file File input
     * @return object
     */
    private static function _FILE($file)
    {

        $checkFile = function ($fileObj) {

            return is_object($fileObj) && method_exists($fileObj, 'getName');
        };

        $status = true;

        // Check $file is array or object
        if (is_array($file)) {
            foreach ($file as $key => $val) {

                $check = $checkFile($file[$key]);
                if (!$check) $check;
            }
        } else {
            $check = $checkFile($file);
            if (!$check) $check;
        }

        $result = new \stdClass();
        $result->status = $status;
        $result->fail_detail = [
            'reason' => "This payload can only be filled by files",
            'expectation' => "Fill the payload with files"
        ];
        $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param array|object $file File input
     * @param mixed $support Enum
     * @return object
     */
    private static function _FILE_ACCEPT($file, $support)
    {

        $checkFile = function ($fileObj, $support) {

            $parts = explode('.', $fileObj->getName());
            $ext = strtolower(end($parts));

            $return = new \stdClass();
            $return->status = true;

            if (!in_array($ext, preg_split('/[,, ]/', $support))) {

                $return->status = false;
                $return->detail = [
                    'name' => $fileObj->getName(),
                    'extension' => $ext
                ];
            }

            return $return;
        };

        $invalidFiles = [];
        $status = true;

        // Check $file is array or object
        if (is_array($file)) {
            foreach ($file as $key => $val) {

                $check = $checkFile($file[$key], $support);
                if (!$check->status) {

                    $status = $check->status;
                    $invalidFiles[] = $check->detail;
                }
            }
        } else {
            $check = $checkFile($file, $support);
            if (!$check->status) {

                $status = $check->status;
                $invalidFiles[] = $check->detail;
            }
        }

        $result = new \stdClass();
        $result->status = $status;
        $result->fail_detail = [
            'reason' => "This payload does not accept uploaded file extensions",
            'expectation' => "Only accepts file extensions ({$support})",
            'invalid_files' => $invalidFiles
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }

    /** 
     * @param array|object $file File input
     * @return object
     */
    private static function _SINGLE_FILE($file)
    {

        $result = new \stdClass();
        $result->status = !is_array($file);
        $result->fail_detail = [
            'reason' => "This payload can only be filled by single file",
            'expectation' => "Fill the payload with only single file, not in the form of an array"
        ];
        // $result->break = !$result->status; // To stop validate next rules when status is false

        return $result;
    }
}
