<div class="head_title">
    <div class="title">
        Dashboard
    </div>
    <div class="tagline">
        Dashboard Kontrol Panel
    </div>
</div>


<script type="text/javascript">
    // 
    $('body')
        .find('*[class*="panel_container"] .content_container').on('scroll', function() {

            let scrollPosY = $(this).scrollTop();

            if (scrollPosY > 5) $(this).find('.content_head').addClass('active');
            else $(this).find('.content_head').removeClass('active');
        });
</script>