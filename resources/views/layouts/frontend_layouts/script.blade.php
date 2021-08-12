<script type="application/javascript">
    function closeNotice() {
        $('#header-notify').css('display', 'none');
    }

</script>

<script type="application/javascript">
    function showFaq(id) {

        $(`.fi-title i`).css('transform', 'rotate(0deg)');
        $(`#${id} .fi-title i`).css('transform', 'rotate(45deg)');

        $(`.fi-title`).css('background-color', '#f8f9fa');
        $(`#${id} .fi-title`).css('background-color', '#f05d2e');

        $('.fi-desc').css('max-height', '0px');

        $(`.fi-title .fi-head > * ,.fi-title  > *`).css('color', 'black');
        $(`#${id} .fi-title .fi-head > *, #${id} .fi-title  > *`).css('color', 'white');

        if ($(`#${id} p`).css('max-height') == '800px') {
            $(`#${id} p`).css('max-height', '0px');
            $(`#${id} .fi-title`).css('background-color', '#f8f9fa');
            $(`#${id} .fi-title .fi-head > *, #${id} .fi-title  > *`).css('color', 'black');
            $(`#${id} .fi-title i`).css('transform', 'rotate(0deg)');

        } else {
            $(`#${id} p`).css('max-height', '800px');
        }
    }

</script>


<script type="application/javascript">
    $(document).mousemove(function(e) {
        $(".pointer").css({
            left: e.pageX,
            top: e.pageY
        });
    });

    // get height of body
    let scrollHeight = Math.max(
        document.body.scrollHeight, document.documentElement.scrollHeight,
        document.body.offsetHeight, document.documentElement.offsetHeight,
        document.body.clientHeight, document.documentElement.clientHeight
    );


    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style =
                "background-color:white;padding-top:5px; box-shadow:0 6px 12px rgba(0, 0, 0, 0.1);";
            $('.nav-menu').css('top', '5px');
            if (bg_color == 'black') {
                $('.navbar .color').css('color', 'black');
            }
            $('nav').addClass('animate-nav');
            //  scroll top
            $('.scroll-top').css('display', 'block');
        } else {
            $('.nav-menu').css('top', '20px');
            if (bg_color == 'black') {
                $('.navbar .color').css('color', 'white');
            }
            $('nav').removeClass('animate-nav');
            document.getElementById("navbar").style = "background-color:rgba(0,0,0,0)";
            //  scroll top
            $('.scroll-top').css('display', 'none');
        }

        var percent = (window.pageYOffset / scrollHeight * 100);
        $('.st-line-inner').css('width', percent + '%');


    }

    function scrollUp() {
        window.scrollTo(0, 0);
    }

    // alert notification remove
    setTimeout(() => {
        var x = $('.alert').css('display', 'none');
        $('#alert-message').css('display', 'none');
        $('#alert-message').css('padding', '0px');
    }, 4000);

    // session alert
    var msg = '{{ Session::get('success') }}';
    var exist = '{{ Session::has('success') }}';
    if (exist) {
        $('#alert-message').html(msg);
        $('#alert-message').css('padding', '10px 20px');
    }

</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>





</body>

</html>
