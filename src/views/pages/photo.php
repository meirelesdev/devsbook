<?php $render('header'); ?>
    <section class="container main">
        <?php $render('sidebar'); ?>
        <section class="feed">

            <div class="row">
                <div class="box flex-1 border-top-flat">
                    <div class="box-body">
                        <div class="profile-cover" style="background-image: url('media/covers/cover.jpg');"></div>
                        <div class="profile-info m-20 row">
                            <div class="profile-info-avatar">
                                <a href=""><img src="media/avatars/avatar.jpg" /></a>
                            </div>
                            <div class="profile-info-name">
                                <div class="profile-info-name-text"><a href="">Bonieky Lacerda</a></div>
                                <div class="profile-info-location">Campina Grande</div>
                            </div>
                            <div class="profile-info-data row">
                                <div class="profile-info-item m-width-20">
                                    <div class="profile-info-item-n">129</div>
                                    <div class="profile-info-item-s">Seguidores</div>
                                </div>
                                <div class="profile-info-item m-width-20">
                                    <div class="profile-info-item-n">363</div>
                                    <div class="profile-info-item-s">Seguindo</div>
                                </div>
                                <div class="profile-info-item m-width-20">
                                    <div class="profile-info-item-n">12</div>
                                    <div class="profile-info-item-s">Fotos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">

                <div class="column">
                    
                    <div class="box">
                        <div class="box-body">

                            <div class="full-user-photos">

                                <div class="user-photo-item">
                                    <a href="#modal-1" rel="modal:open">
                                        <img src="media/uploads/1.jpg" />
                                    </a>
                                    <div id="modal-1" style="display:none">
                                        <img src="media/uploads/1.jpg" />
                                    </div>
                                </div>
    
                                <div class="user-photo-item">
                                    <a href="#modal-2" rel="modal:open">
                                        <img src="media/uploads/1.jpg" />
                                    </a>
                                    <div id="modal-2" style="display:none">
                                        <img src="media/uploads/1.jpg" />
                                    </div>
                                </div>

                                <div class="user-photo-item">
                                    <a href="#modal-3" rel="modal:open">
                                        <img src="media/uploads/1.jpg" />
                                    </a>
                                    <div id="modal-3" style="display:none">
                                        <img src="media/uploads/1.jpg" />
                                    </div>
                                </div>

                                <div class="user-photo-item">
                                    <a href="#modal-4" rel="modal:open">
                                        <img src="media/uploads/1.jpg" />
                                    </a>
                                    <div id="modal-4" style="display:none">
                                        <img src="media/uploads/1.jpg" />
                                    </div>
                                </div>

                                <div class="user-photo-item">
                                    <a href="#modal-5" rel="modal:open">
                                        <img src="media/uploads/1.jpg" />
                                    </a>
                                    <div id="modal-5" style="display:none">
                                        <img src="media/uploads/1.jpg" />
                                    </div>
                                </div>

                                <div class="user-photo-item">
                                    <a href="#modal-6" rel="modal:open">
                                        <img src="media/uploads/1.jpg" />
                                    </a>
                                    <div id="modal-6" style="display:none">
                                        <img src="media/uploads/1.jpg" />
                                    </div>
                                </div>

                            </div>
                            

                        </div>
                    </div>

                </div>
                
            </div>

        </section>
    </section>
    
    <?php $render('footer'); ?>