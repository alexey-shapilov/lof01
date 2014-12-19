<?php
if (!defined('INIT')) exit('No direct script access allowed');

?>

<div class="nav-footer clearfix">
    <div class="b-mob_contacts">
        <ul class="b-contacts_items">
            <li class="b-contacts_items-item">
                <div class="b1">
                    <div class="b2">
                        <div class="ico"></div>
                        <a href="mailto:shapilov@mail.com">shapilov@mail.com</a>
                    </div>
                </div>
            </li>
            <li class="b-contacts_items-item">
                <div class="b1">
                    <div class="b2">
                        <div class="ico"></div>
                        <a href="tel:+79312258624">+7 931 225 8624</a>
                    </div>
                </div>
            </li>
            <li class="b-contacts_items-item">
                <div class="b1">
                    <div class="b2">
                        <div class="ico"></div>
                        <a href="skype:alexey.shapilov?call">alexey.shapilov</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="b1">
        <div class="b2">
            <div class="b-mob_socials">
                <a href="https://vk.com/alexey.shapilov" class="b-head_socials-vk"><span class="href_text">ВКонтакте</span></a>
                <a href="" class="b-head_socials-twitter"><span class="href_text">twitter</span></a>
                <a href="" class="b-head_socials-facebook"><span class="href_text">facebook</span></a>
                <a href="https://github.com/alexey-shapilov" class="b-head_socials-github"><span class="href_text">github</span></a>
            </div>
        </div>
    </div>
</div>

<div class="footer-push"></div>
</div>

<div class="b-footer clearfix">
    <div class="split-line clearfix"></div>
    <div class="b-footer_body">
        <?php
        if ($_SESSION['user_login']) {
            echo '<a href="logout" class="lock lock-open"></a>';
        } else {
            echo '<a href="admin" class="lock lock-close"></a>';
        }
        ?>
        <p class="b-footer_copyright">&copy; "Это мой сайт, пожалуйста, не копируйте и не воруйте его</p>
    </div>
</div>

<script src="/js/jquery.mini.1_11.js"></script>
<script src="/css/fancybox/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.placeholder.js"></script>
<script src="/js/app.js"></script>
</body>
</html>