<?php
const COOKIE_SHOPEE_AFFILATE = 'shopee_affiliate';
$linkAffiliate = 'https://shope.ee/6AGYHPhTCC';
$setMinutes = 1;
$timeOpenLink = $setMinutes * 60 * 1000;

if (!isset($_COOKIE[COOKIE_SHOPEE_AFFILATE])) {
?>
    <script>
        setTimeout(function() {
            var date = new Date();
            date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
            var expires = "expires=" + date.toUTCString();
            document.cookie = "<?= COOKIE_SHOPEE_AFFILATE ?>=<?= COOKIE_SHOPEE_AFFILATE ?>; " + expires + "; path=/;";
            window.open('<?= $linkAffiliate ?>', '_blank');
        }, <?= $timeOpenLink ?>);
    </script>
<?php
}
