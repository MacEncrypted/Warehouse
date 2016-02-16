<?php $this->load->view('template/header_view.php'); ?>

    <!-- hero area (the grey one with a slider -->
    <section id="hero" class="clearfix">
        <!-- responsive FlexSlider image slideshow -->
        <div class="wrapper">
            <div class="row">
                <div class="grid_5">
                    <h1>Projekt Warehouse</h1>
                    <p>...to <b>idealne</b> narzędzie do monitorowania stanów magazynowych. Udostępnia wiele poziomów
                        zarządzania produktami oraz przepływem danych w firmie.</p>
                    <b>Ta wersja systemu została wykonana dla Bibtex-pol Sp. z o.o. przez Encrypted Software Maciej
                        Lewandowski.</b>
                </div>
                <div class="grid_7 rightfloat">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="<?php echo base_url(); ?>images/warehouse-pic3.jpg"/>
                                <p class="flex-caption">Responsywny szablon - do odtwarzania na urządzeniach
                                    mobilnych.</p>
                            </li>
                            <li>
                                <img src="<?php echo base_url(); ?>images/warehouse-pic4.jpg"/>
                                <p class="flex-caption">Log systemowy, by nic nie umknęło uwagi.</p>
                            </li>
                            <li>
                                <img src="<?php echo base_url(); ?>images/warehouse-pic1.jpg"/>
                                <p class="flex-caption">Kopia zapasowa pod jednym guzikiem.</p>
                            </li>
                            <li>
                                <img src="<?php echo base_url(); ?>images/warehouse-pic2.jpg"/>
                                <p class="flex-caption">Prosty export CSV (do odtworzenia w Microsoft Excel lub
                                    Calc).</p>
                            </li>
                        </ul>
                    </div><!-- FlexSlider -->
                </div><!-- end grid_7 -->
            </div><!-- end row -->
        </div><!-- end wrapper -->
    </section><!-- end hero area -->

<?php $this->load->view('template/footer_view.php'); ?>