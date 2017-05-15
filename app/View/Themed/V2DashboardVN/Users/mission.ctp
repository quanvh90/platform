<section id="wrapper">
    <ul class="rs lstlichsu cf">
        <li><a href="javascript:void(0)" class="active" id="click_earn">Kiếm Funcoin</a></li>
        <li><a href="javascript:void(0)" id="click_history">Lịch Sử</a></li>
    </ul>
    <div class="list-task">
        <div id="mission">
            <!--		<div class="box-task task-taigameX">-->
            <!--			<div class="task-inner">-->
            <!--				<span class="task-ico" style="background: url('images/gdm.png') 0 0 no-repeat;background-size: cover"></span>-->
            <!--				<h3 class="rs task-name">Titan Đại Chiến</h3>-->
            <!--				<p class="rs task-dl">300k</p>-->
            <!--				<a href="javascript:void(0)" class="task-go">Free</a>-->
            <!--			</div>-->
            <!--			<span class="task-coin">+10 <span class="f-textgray">Tải game nhận ngay free FC</span></span>-->
            <!--		</div>-->
            <!--		<div class="box-task task-taigameC">-->
            <!--			<div class="task-inner">-->
            <!--				<span class="task-ico" style="background: url('images/gdm.png') 0 0 no-repeat;background-size: cover"></span>-->
            <!--				<h3 class="rs task-name">Titan Đại Chiến</h3>-->
            <!--				<p class="rs task-dl">300k</p>-->
            <!--				<a href="javascript:void(0)" class="task-go">Free</a>-->
            <!--			</div>-->
            <!--			<span class="task-coin"> <span class="f-textgray">Tải game nhận ngay free Giftcode</span></span>-->
            <!--		</div>-->
            <?php if(!($this->Session->read('Auth.User.facebook_uid'))){ ?>
                <div class="box-task task-ketnoi">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Kết nối tài khoản với Facebook') ; ?></h3>
                        <p class="rs task-text"><?php echo __('Kết nối tài khoản với Facebook để bảo vệ tài khoản, chơi game trên nhiều thiết bị và nhận FunCoin.') ;?></p>
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'connect_facebook')) ?>" class="task-go">Go</a>
                    </div>
                    <span class="task-coin">+10</span>
                </div>
            <?php } ?>
            <?php if(!empty($infoShare)){ ?>
                <div class="box-task task-share ">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __("Chia sẻ game").' '. $infoShare['content']; ?></h3>
                        <p class="rs task-text"><?php echo __('Gửi một chia sẻ lên Facebook và nhận FunCoin.');?></p>
                        <a href="javascript:MobAppSDKexecute('mobActionShareFB', {
	                        'url':'http://<?php echo isset($infoShare['url'])?$infoShare['url']:''; ?>',
	                        'content':'<?php echo isset($infoShare['content'])?$infoShare['content']:''; ?>',
	                        'callbackUrl':'http://a.smobgame.com/plf/oauthv2/afterActionExecuted?action_name=shareFacebook&id_action=<?php echo $infoShare['id'] ; ?>'
	                    })" class="task-go">Go</a>
                    </div>
                    <span class="task-coin">+1</span>
                </div>
            <?php } ?>
            <?php if(!empty($infoLike)){ ?>
                <div class="box-task task-like">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __("Like fanpage game").' '.$infoLike['content']; ?></h3>
                        <p class="rs task-text"><?php echo __('Like fanpage Facebook của game và nhận  FunCoin.');?></p>
                        <a href="javascript:MobAppSDKexecute('mobOpenFanPage',
	                        {
	                            'pageid': '<?php echo isset($infoLike['fanpage'])?$infoLike['fanpage']:''; ?>',
	                            'callbackUrl':'http://a.smobgame.com/plf/oauthv2/afterActionExecuted?action_name=likeFacebook&id_action=<?php echo $infoLike['id'] ; ?>'
	                        })" class="task-go">Go</a>
                    </div>
                    <span class="task-coin">+1</span>
                </div>
            <?php } ?>
            <?php if(empty($action_finished['finished_invite'])){
                $url = 'http://'.$website_url.'/landing';
                if(isset($game['id'])){
                    if(strpos($game['slug'], 'renew') !== false){
                        $url = 'http://'.$website_url.'/landing_renew';
                    }
                }
                ?>
                <div class="box-task task-invite">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Mời bạn bè trên Facebook');?></h3>
                        <p class="rs task-text"><?php echo __('Gửi lời mời chơi game đến bạn bè trên Facebook của bạn và nhận FunCoin.')?></p>
                        <a href="javascript:MobAppSDKexecute('mobAppInvite', {
	                            'applinkurl': '<?php echo $url ; ?>',
	                            'previewimageurl':'<?php if(isset($game['data']['invitefb2_image']['url']) && $game['data']['invitefb2_image']['url'] != ''){ echo $game['data']['invitefb2_image']['url']; } else {echo 'no image';} ?>',
	                            'callbackUrl':'http://a.smobgame.com/plf/oauthv2/afterActionInvite?action_name=inviteFriend'
	                        })" class="task-go">Go</a>
                    </div>
                    <span class="task-coin">+1</span>
                </div>
            <?php } ?>
            <?php if($info_login == 0){ ?>
                <div class="box-task task-taikhoan">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Hoàn thiện thông tin đăng nhập');?></h3>
                        <p class="rs task-text"><?php echo __('Nhập email đăng nhập, tên đăng nhập và tạo mật khẩu cho tài khoản FunID và nhận FunCoin.');?></p>
                        <a href="<?php echo $this->Html->url(array('controller'=>'UserInfors','action' => 'infoUserLogin')) ?>" class="task-go">Go</a>
                    </div>
                    <span class="task-coin">+5</span>
                </div>
            <?php } ?>
            <?php if($info_person == 0){ ?>
                <div class="box-task task-taikhoan">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Hoàn thiện thông tin cá nhân');?></h3>
                        <p class="rs task-text"><?php echo __('Cập nhật thông tin cá nhân gồm tên, tuổi, địa chỉ … giúp bảo vệ tài khoản khi có tranh chấp và nhận FunCoin.');?></p>
                        <?php if($info_login != 0){ ?>
                            <a href="<?php echo $this->Html->url(array('controller'=>'UserInfors','action' => 'infoUserPersonal')) ?>" class="task-go">Go</a>
                        <?php }else{ ?>
                            <a href="javascript:void(0)" onclick="firstChange();" class="task-go">Go</a>
                        <?php } ?>
                    </div>
                    <span class="task-coin">+5</span>
                </div>
            <?php } ?>
            <?php if($info_security == 0){ ?>
                <div class="box-task task-taikhoan">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Hoàn thiện thông tin bảo mật');?></h3>
                        <p class="rs task-text"><?php echo __('Cập nhật email bảo vệ, số điện thoại và CMND để bảo vệ tài khoản FunID và nhận FunCoin.');?></p>
                        <?php if($info_login != 0){ ?>
                            <a href="<?php echo $this->Html->url(array('controller'=>'UserInfors','action' => 'infoUserSecurity')) ?>" class="task-go">Go</a>
                        <?php }else{ ?>
                            <a href="javascript:void(0)" onclick="firstChange();" class="task-go">Go</a>
                        <?php } ?>
                    </div>
                    <span class="task-coin">+5</span>
                </div>
            <?php } ?>
            <div class="box-task task-login">
                <div class="task-inner">
                    <span class="task-ico spr-nv"></span>
                    <h3 class="rs task-name"><?php echo __('Đăng nhập hàng ngày'); ?></h3>
                    <p class="rs task-text"><?php echo __('Đăng nhập vào 1 game bất kỳ của Funtap hàng ngày để nhận FunCoin.') ;?></p>
                </div>
                <span class="task-coin">+1</span>
            </div>
            <div class="box-task task-login">
                <div class="task-inner">
                    <span class="task-ico spr-nv"></span>
                    <h3 class="rs task-name"><?php echo __('Đăng nhập 3 ngày liên tiếp'); ?></h3>
                    <p class="rs task-text"><?php echo __('Đăng nhập vào game bất kỳ của Funtap trong 3 ngày liên tiếp để nhận FunCoin.') ;?></p>
                </div>
                <span class="task-coin">+5</span>
            </div>
            <div class="box-task task-login">
                <div class="task-inner">
                    <span class="task-ico spr-nv"></span>
                    <h3 class="rs task-name"><?php echo __('Đăng nhập 7 ngày liên tiếp'); ?></h3>
                    <p class="rs task-text"><?php echo __('Đăng nhập vào game bất kỳ của Funtap trong 7 ngày liên tiếp để nhận FunCoin.') ;?></p>
                </div>
                <span class="task-coin">+10</span>
            </div>
            <div class="box-task task-login">
                <div class="task-inner">
                    <span class="task-ico spr-nv"></span>
                    <h3 class="rs task-name"><?php echo __('Đăng nhập 30 ngày liên tiếp'); ?></h3>
                    <p class="rs task-text"><?php echo __('Đăng nhập vào game bất kỳ của Funtap trong 30 ngày liên tiếp để nhận FunCoin.') ;?></p>
                </div>
                <span class="task-coin">+20</span>
            </div>
        </div>
        <div id="history">
            <?php if($this->Session->read('Auth.User.facebook_uid')){ ?>
                <div class="box-task task-ketnoi">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Kết nối tài khoản với Facebook') ;?></h3>
                        <p class="rs task-text"><?php echo __('Kết nối tài khoản với Facebook để bảo vệ tài khoản, chơi game trên nhiều thiết bị và nhận FunCoin.') ; ?></p>
                        <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                    </div>
                    <span class="task-coin">+10</span>
                </div>
            <?php } ?>

            <?php if(!empty($action_finished['finished_share'])){
                foreach($action_finished['finished_share'] as $finished_share){ ?>
                    <div class="box-task task-share ">
                        <div class="task-inner">
                            <span class="task-ico spr-nv"></span>
                            <h3 class="rs task-name"><?php echo __("Chia sẻ game").' '.$finished_share['UserAction']['action_link'] ;?></h3>
                            <p class="rs task-text"><?php echo __('Gửi một chia sẻ lên Facebook và nhận FunCoin.') ;?></p>
                            <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                        </div>
                        <span class="task-coin">+1</span>
                    </div>
                <?php }} ?>
            <?php if(!empty($action_finished['finished_like'])){
                foreach($action_finished['finished_like'] as $finished_like){ ?>
                    <div class="box-task task-like">
                        <div class="task-inner">
                            <span class="task-ico spr-nv"></span>
                            <h3 class="rs task-name"><?php echo __("Like fanpage game").' '.$finished_like['UserAction']['action_link']; ?></h3>
                            <p class="rs task-text"><?php echo __('Like fanpage Facebook của game và nhận FunCoin.'); ?></p>
                            <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                        </div>
                        <span class="task-coin">+1</span>
                    </div>
                <?php }} ?>
            <?php if(!empty($action_finished['finished_invite'])){ ?>
                <div class="box-task task-invite">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Mời bạn bè trên Facebook');?></h3>
                        <p class="rs task-text"><?php echo __('Gửi lời mời chơi game đến bạn bè trên Facebook của bạn và nhận FunCoin.')?></p>
                        <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                    </div>
                    <span class="task-coin">+1</span>
                </div>
            <?php } ?>
            <?php if($info_login){ ?>
                <div class="box-task task-taikhoan">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Hoàn thiện thông tin đăng nhập');?></h3>
                        <p class="rs task-text"><?php echo __('Nhập email đăng nhập, tên đăng nhập và tạo mật khẩu cho tài khoản FunID và nhận FunCoin.');?></p>
                        <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                    </div>
                    <span class="task-coin">+5</span>
                </div>
            <?php } ?>
            <?php if($info_person){ ?>
                <div class="box-task task-taikhoan">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Hoàn thiện thông tin cá nhân');?></h3>
                        <p class="rs task-text"><?php echo __('Cập nhật thông tin cá nhân gồm CMND, địa chỉ… giúp bảo vệ tài khoản khi có tranh chấp và nhận FunCoin.');?></p>
                        <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                    </div>
                    <span class="task-coin">+5</span>
                </div>
            <?php } ?>
            <?php if($info_security){ ?>
                <div class="box-task task-taikhoan">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Hoàn thiện thông tin bảo mật');?></h3>
                        <p class="rs task-text"><?php echo __('Cập nhật email bảo mật, số điện thoại để bảo vệ tài khoản FunID và nhận FunCoin.');?></p>
                        <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                    </div>
                    <span class="task-coin">+5</span>
                </div>
            <?php } ?>
            <?php if (array_key_exists(Funpoint::TYPE_LOGIN_DAILY, $flag_login)) {?>
                <div class="box-task task-login">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Đăng nhập hàng ngày'); ?></h3>
                        <p class="rs task-text"><?php echo __('Đăng nhập vào 1 game bất kỳ của Funtap hàng ngày để nhận FunCoin.') ;?></p>
                        <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                    </div>
                    <span class="task-coin">+1</span>
                </div>
            <?php }?>
            <?php if (array_key_exists(Funpoint::TYPE_3_DAYS_LOGIN, $flag_login)) {?>
                <div class="box-task task-login">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Đăng nhập 3 ngày liên tiếp'); ?></h3>
                        <p class="rs task-text"><?php echo __('Đăng nhập vào game bất kỳ của Funtap trong 3 ngày liên tiếp để nhận FunCoin.') ;?></p>
                        <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                    </div>
                    <span class="task-coin">+5</span>
                </div>
            <?php }?>
            <?php if (array_key_exists(Funpoint::TYPE_7_DAYS_LOGIN, $flag_login)) {?>
                <div class="box-task task-login">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Đăng nhập 7 ngày liên tiếp'); ?></h3>
                        <p class="rs task-text"><?php echo __('Đăng nhập vào game bất kỳ của Funtap trong 3 ngày liên tiếp để nhận FunCoin.') ;?></p>
                        <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                    </div>
                    <span class="task-coin">+10</span>
                </div>
            <?php }?>
            <?php if (array_key_exists(Funpoint::TYPE_30_DAYS_LOGIN, $flag_login)) {?>
                <div class="box-task task-login">
                    <div class="task-inner">
                        <span class="task-ico spr-nv"></span>
                        <h3 class="rs task-name"><?php echo __('Đăng nhập 30 ngày liên tiếp'); ?></h3>
                        <p class="rs task-text"><?php echo __('Đăng nhập vào game bất kỳ của Funtap trong 30 ngày liên tiếp để nhận FunCoin.') ;?></p>
                        <a href="javascript:void(0)" class="task-ok spr-nv"></a>
                    </div>
                    <span class="task-coin">+20</span>
                </div>
            <?php }?>
        </div>
    </div>

</section>
<div class="box-scr" id="backTop"><span class="unu"></span> <span class="doi"></span> <span class="trei"></span> </div>
<script>
    $(document).ready(function(){
        $('#history').hide();
        $('#click_history').click(function(){
            $(this).addClass('active');
            $('#history').show();
            $('#mission').hide();
            $('#click_earn').removeClass('active');
        });
        $('#click_earn').click(function(){
            $(this).addClass('active');
            $('#mission').show();
            $('#history').hide();
            $('#click_history').removeClass('active');
        });
    });
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
            jQuery('#backTop').fadeOut();
        }else {
            jQuery('#backTop').fadeIn();
        }
    });
    var $elem = $('#wrapper');
    $('#backTop').click(
        function (e) {
            $('html, body').animate({scrollTop: $elem.height()}, 800);
        }
    );
    function firstChange(){
        alert('Bạn cần tạo tài khoản FunID (email đăng nhập & mật khẩu) trước khi thực hiện hành động này');
        window.location.href = "<?php echo $this->Html->url(array('controller'=>'UserInfors','action' => 'infoUserLogin')); ?>";
    }
</script>