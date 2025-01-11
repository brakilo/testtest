<script src="./views/assets/jquery.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.write(decodeBase64Content('<?= base64_encode($html) ?>'));
    });
</script>