<div class="mry-content-frame" id="scroll">
    <canvas class="mry-dots" style="display: none"></canvas>

    <div class="mry-head-bg">
        <img src="img/light/projects/prjct-6/1.jpg" alt="background">
        <div class="mry-bg-overlay"></div>
    </div>

    <div class="mry-banner mry-p-140-0">
        <div class="container">
            <div class="mry-main-title mry-title-center">
                <div class="mry-subtitle mry-mb-20 mry-fo">Contact</div>
                <h1 class="mry-mb-20 mry-fo">Do you have any questions?<br><span class="mry-border-text">Write us a message.</span><span class="mry-animation-el"></span></h1>
                <div class="mry-text mry-fo">Lorem ipsum dolor sit amet, consectetur.<br>Adipisicing elit suscipit, at.</div>
                <div class="mry-scroll-hint-frame">
                    <a class="mry-scroll-hint mry-smooth-scroll mry-magnetic-link mry-fo" href="#mry-anchor">
                        <span class="mry-magnetic-object"></span>
                    </a>
                    <div class="mry-label mry-fo">Scroll Down</div>
                </div>
            </div>
        </div>
    </div>

    <!-- contact -->
    <div class="mry-about mry-p-100-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="mry-mb-100 mry-text-center">
                                <div class="mry-numbering mry-fo">
                                    <div class="mry-border-text">01</div>
                                    <div class="mry-subtitle">Location</div>
                                </div>
                                <div class="mry-fade-object mry-mb-100">
                                    <h4 class="mry-mb-20 mry-fo">Welcome to visit</h4>
                                    <p class="mry-text mry-mb-20 mry-fo">Canada, Toronto,<br>HTGS 4456 North Av.</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="mry-mb-100 mry-text-center">
                                <div class="mry-numbering mry-fo">
                                    <div class="mry-border-text">02</div>
                                    <div class="mry-subtitle">Contact</div>
                                </div>
                                <div class="mry-fade-object mry-mb-100">
                                    <h4 class="mry-mb-20 mry-fo">Shall we talk?</h4>
                                    <p class="mry-text mry-fo">Email: mireya.inbox@mail.com <br>Phone: +4 9(054) 996 84 25</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-12">

                    <div class="mry-main-title mry-title-center mry-p-0-40">
                        <div class="mry-numbering mry-fo">
                            <div class="mry-border-text">03</div>
                            <div class="mry-subtitle">Contact form</div>
                        </div>
                        <h2 class="mry-fo">Write us a message</h2>
                    </div>

                </div>

                <div class="col-lg-8">

                    <form method="POST" id="form" class="mry-form mry-mb-100" action="send.php">

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="mry-label mry-fo" for="firstName">First Name</label>
                                <div class="mry-fo"><input id="firstName" name="firstName" placeholder="John" class="mry-default-link" type="text" data-parsley-pattern="^[a-zA-Z\s.]+$" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="mry-label mry-fo" for="lastName">Last Name</label>
                                <div class="mry-fo"><input id="lastName" name="lastName" placeholder="Johnsone" class="mry-default-link" type="text" data-parsley-pattern="^[a-zA-Z\s.]+$" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="mry-label mry-fo" for="email">Email</label>
                                <div class="mry-fo"><input id="email" name="email" placeholder="type.your.mail@here" class="mry-default-link" type="email" required></div>
                            </div>
                            <div class="col-lg-6">
                                <label class="mry-label mry-fo" for="phone">Phone</label>
                                <div class="mry-fo"><input id="phone" name="phone" placeholder="+0 (000) 000 00 00" class="mry-default-link" type="text" data-parsley-pattern="^\+{1}[0-9]+$"></div>
                            </div>
                        </div>

                        <div class="mry-fade-object">
                            <label class="mry-label mry-fo" for="message">Message</label>
                            <div class="mry-fo">
											<textarea id="message" name="message" rows="8" cols="80" placeholder="Type your message here" class="mry-default-link" type="text"
                                                      data-parsley-pattern="^[a-zA-Z0-9\s.:,!?']+$" required></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="mry-fo"><button type="submit" class="mry-btn mry-default-link">Send message</button></div>
                            </div>
                            <div class="col-lg-8">
                                <p class="mry-text mry-simple-text mry-contact-hint mry-fo"><span class="mry-color-text">*</span> We promise not to share your personal information with
                                    third parties.</p>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-lg-12">

                    <div class="mry-main-title mry-title-center mry-p-0-40">
                        <div class="mry-numbering mry-fo">
                            <div class="mry-border-text">04</div>
                            <div class="mry-subtitle">Map</div>
                        </div>
                        <h2 class="mry-fo">Welcome to visit</h2>
                    </div>

                </div>

                <div class="col-lg-10">

                    <div class="mry-map-frame mry-mb-100 mry-fo">
                        <div id='map-light' class="mry-map mry-map-light"></div>
                        <div class="mry-lock mry-magnetic-link"><i class="fas fa-lock mry-magnetic-object"></i></div>
                        <div class="mry-curtain"></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- contact end -->

    <!-- footer -->
    <footer class="mry-footer">
        <div class="container">
            <div class="mry-main-title mry-title-center mry-p-0-100">
                <div class="mry-subtitle mry-mb-20 mry-fo">Call to action</div>
                <h2 class="mry-h1 mry-mb-20 mry-fo">We have an offer <span class="mry-border-text">for you</span></h2>
                <div class="mry-text mry-mb-30  mry-fo">Interesting? Enter your email address to find out</div>
                <div class="mry-fo">
                    <a href="contact.html" class="mry-anima-link mry-btn mry-btn-color mry-default-link">Let's discuss</a>
                    <a href="portfolio-grid-1.html" class="mry-anima-link  mry-btn-text mry-default-link">Portfolio</a>
                </div>
            </div>
        </div>
        <div class="mry-footer-copy">
            <div class="container">
                <div>Mireya © early 2021</div>
                <ul class="mry-social">
                    <li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#."><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#."><i class="fab fa-behance"></i></a></li>
                    <li><a href="#."><i class="fab fa-dribbble"></i></a></li>
                </ul>
                <div>By: <a href="https://themeforest.net/user/ultimatewebsolutions/" class="mry-default-link" target="_blank">UWS</a></div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <div class="mry-head-bg mry-head-bottom">
        <img src="img/light/projects/prjct-2/1.jpg" alt="background">
        <div class="mry-bg-overlay"></div>
    </div>

</div>
