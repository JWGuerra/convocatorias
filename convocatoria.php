<section id="content">
    <div class="container content">
        <!-- Service Blcoks -->
        <div class="row">
            <?php
            $sql = "SELECT * FROM `tblConvocatoria`";
            $mydb->setQuery($sql);
            $comp = $mydb->loadResultList();
            foreach ($comp as $convocatoria) {
            ?>
                <div class="col-sm-4 info-blocks">
                    <i class="icon-info-blocks fa fa-briefcase"></i>
                    <div class="info-blocks-in">
                        <h3><?php echo '<a href="' . web_root . 'index.php?q=hiring&search=' . $convocatoria->CONVOCATORIA. '">' . $convocatoria->CONVOCATORIA. '</a>'; ?></h3>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</section>