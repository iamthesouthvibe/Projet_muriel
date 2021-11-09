<footer data-aos="fade-up" data-aos-anchor-placement="top-bottom">
    <div class="footer_class">
        <div>
            <ul>
                <li>
                    <a class="waitBeforeNavigate" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="" class="bouton-up">Haut de la Page</a>
                </li>
            </ul>
        </div>
        <div>
            <ul>
                <li>
                    <h4 data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">Destinations :</h4>
                </li>
                <li>
                    <a class="waitBeforeNavigate" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="maison.php?room=23">Martinique</a>
                </li>
                <li>
                    <a class="waitBeforeNavigate" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="maison.php?room=25">Narbonne</a>
                </li>
                <li>
                    <a class="waitBeforeNavigate" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="maison.php?room=24">Gruissan</a>
                </li>
                <li>
                    <a class="waitBeforeNavigate" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="maison.php?room=26">Pyrénnées</a>
                </li>
            </ul>
        </div>
        <div>
            <ul>
                <li>
                    <h4 data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">Pages :</h4>
                </li>
                <li>
                    <a class="waitBeforeNavigate" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="/index.php">Home</a>
                </li>
                <li>
                    <a class="waitBeforeNavigate" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="/blog.php">Blog</a>
                </li>
                <li>
                    <a class="waitBeforeNavigate" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="/contact.php">Contact</a>
                </li>
                <li>
                    <a class="waitBeforeNavigate" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="/RGPD.php">RGPD</a>
                </li>
                <li>
                    <a class="waitBeforeNavigate" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="/admin/login.php">Admin</a>
                </li>
            </ul>
        </div>
        <div>
            <ul>
                <li>
                    <h4 data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">Social :</h4>
                </li>
                <li>
                    <a data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" href="https://www.instagram.com/" target="_blank">Instagram</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer_informations">
        <div>
            <h5>2021 All Right are reserved</h5>
        </div>
        <div>
            <h5>Website designed and coded by <br>
                <a href="https://www.instagram.com/jeanvayssie/" target="_blank" class="lien-insta"> Jean Vayssié </a> et <a href="https://www.instagram.com/iamthesouthvibe/" target="_blank" class="lien-insta"> Léo Labeaume </a>
            </h5>
        </div>
    </div>
</footer>

<script>
    function waitBeforeNavigate(ev) {
        ev.preventDefault(); // prevent default anchor behavior
        const goTo = this.getAttribute("href"); // store anchor href

        setTimeout(function() {
            window.location = goTo;
        }, 1000); // time in ms

        document.body.style.opacity = "0"
    };

    document.querySelectorAll(".waitBeforeNavigate")
        .forEach(EL => EL.addEventListener("click", waitBeforeNavigate));
</script>