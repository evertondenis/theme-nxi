            <footer>
            	<div class="container hr-border">
                    <div class="col-md-4">
                        <h1 class="logo-footer"><a href="/" title="Next Idea, uma agência de Inbound Marketing"><img class="img-responsive" src="<?php bloginfo('template_url');?>/images/logo-next-idea-middle.png" width="131" height="57" alt="Next Idea, uma agência de Inbound Marketing"></a></h1>
                    </div>
                    <div class="col-md-8 text-right">
                        <ul>
                            <li><a href="https://www.facebook.com/nextideadigital" target="_blank" class="ico-facebook" title="link Facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span>facebook</span></a></li>
                            <li><a href="https://twitter.com/nextideadigital" target="_blank" class="ico-twitter" title="link Twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span>twitter</span></a></li>
                            <li><a href="https://plus.google.com/u/0/+NextideaBr" target="_blank" class="ico-google-plus" title="link Google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i><span>google plus</span></a></li>
                            <li><a href="https://www.linkedin.com/company/next-idea-estrategia-digital" target="_blank" class="ico-linkedin" title="link Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i><span>linkedin</span></a></li>
                            <li><a href="https://www.instagram.com/nextideadigital/" target="_blank" class="ico-instagram" title="link Instagram"><i class="fa fa-instagram" aria-hidden="true"></i><span>instagram</span></a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
            	</div>
            	<div class="container">
                    <?php
                    $page = get_page_by_path('footer', OBJECT);
                    echo ($page->post_content);
                    ?>
            		<!-- <div class="col-md-4 text-center">
                        <div class="box-footer">
                            <p><i class="fa fa-phone" aria-hidden="true"></i></p>
                            <p>São Paulo/SP</p>
                            <p><span>+55 11 3280-4320</span></p>
                        </div>
            		</div>
					<div class="col-md-4 text-center">
                        <div class="box-footer">
                            <p><i class="fa fa-phone" aria-hidden="true"></i></p>
    						<p>Joinville/SC</p>
    						<p><span>+55 11 3280-4320</span></p>
                        </div>
					</div>
					<div class="col-md-4 text-center">
                        <div class="box-footer">
                            <p><i class="fa fa-map" aria-hidden="true"></i></p>
    						<p>Rua São Paulo, 31,</p>
    						<p>Sala 10, Joinville / SC</p>
                        </div>
					</div> -->
            	</div>                
            </footer>
        <?php wp_footer(); ?>
    </body>
</html>