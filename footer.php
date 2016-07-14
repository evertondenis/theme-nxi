            <footer>
            	<div class="container hr-border">
                    <div class="col-md-4">
                        <h1 class="logo-footer"><a href="/" title="Next Idea, uma agência de Inbound Marketing"><img class="img-responsive" src="http://new.nextidea/wp-content/themes/nextidea/images/logo-next-idea-middle.png" width="131" height="57" alt="Titulo Imagem"></a></h1>
                    </div>
                    <div class="col-md-8 text-right">
                        <ul>
                            <li><a href="#" class="ico-facebook" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="ico-twitter" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="ico-google-plus" title="Google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="ico-linkedin" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="ico-instagram" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
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