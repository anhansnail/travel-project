
<footer class="footer">
    <script>
        var botmanWidget = {
            frameEndpoint: '<?php echo url('chatbot/endpoint');?>',
            // frameEndpoint: '/botman/chat',
            title: 'Minh Anh Smart',
            bubbleBackground: '#589442',
            mainColor: '#589442',
            displayMessageTime: true,

            // backgroundImage : false
        };
    </script>
    <script type="text/javascript" language="javascript">
        $(document).load(function () {
            $(".path").attr({
                "d": '',
            });
        });
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <div class="footer-socials">
        <a href="https://www.facebook.com/minhanh.vuong.98"><i class="fa fa-facebook"></i></a>
        <a href="https://github.com/anhansnail"><i class="fa fa-twitter"></i></a>
        <a href="https://github.com/anhansnail"><i class="fa fa-instagram"></i></a>
        <a href="https://github.com/anhansnail"><i class="fa fa-google-plus"></i></a>
        <a href="https://github.com/anhansnail"><i class="fa fa-dribbble"></i></a>
        <a href="https://github.com/anhansnail"><i class="fa fa-reddit"></i></a>
    </div>

    <div class="footer-bottom">
        Created By <i class="fa fa-love"></i><a href="https://anhansnail12.000webhostapp.com">Minh Anh Vuong</a>
    </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo getUrl('/'); ?>/ClientAsset/js/bootstrap.min.js"></script>
<script src="<?php echo getUrl('/'); ?>/ClientAsset/js/jquery.bxslider.js"></script>
<script src="<?php echo getUrl('/'); ?>/ClientAsset/js/mooz.scripts.min.js"></script>