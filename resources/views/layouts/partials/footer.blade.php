<!-- Footer-->
<footer id="footer" class="py-3 bg-dark" style="width: 100%;">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; <strong>Read Only</strong> {!! date('Y') !!}</p>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function adjustFooterPosition() {
        var windowHeight = window.innerHeight;
        var footer = document.getElementById('footer');

        if (document.body.offsetHeight < windowHeight) {
            footer.style.position = 'fixed';
            footer.style.bottom = '0';
        } else {
            footer.style.position = 'static';
        }
    }

    window.addEventListener('resize', adjustFooterPosition);
    window.addEventListener('load', adjustFooterPosition);
    document.body.addEventListener('scroll', adjustFooterPosition);
</script>
</body>

</html>
