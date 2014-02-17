<link rel="stylesheet" href="<?php echo $masterCSS ?>" type="text/css" charset="utf-8"/>
<div id="W_E_container"><div id="W_E_TopMessage"></div>
 
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="payPalForm">
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" id="paypalBusiness" value=""  />

<input type="hidden" name="item_name" id="itemName" class="itemName" value="" />
<input type="hidden" name="currency_code" id="currencyCode" class="currencyCode" value="" />
<input type="hidden" name="amount" id="payPalAmount" class="payPalAmount" value="" />
<input type="hidden" name="return" value="<?php echo $returnURL ?>">
<button class="W_E payment" type="submit" id="paymentPayPal"></button>
</form>

<form method="POST" action="https://checkout.google.com/cws/v2/Merchant/<?php echo $WE_google_merchant ?>/checkoutForm" accept-charset="utf-8" id="WE_googleCheckout">
<input type="hidden" name="item_quantity_1" value="1"/> 

<input type="hidden" name="item_name_1" class="itemName" value=""/>
<input type="hidden" name="item_description_1" class="itemName" value=""/>
<input type="hidden" name="item_price_1"  class="payPalAmount" value="" /> 
<input type="hidden" name="item_currency_1" class="currencyCode" value=""/> 
<input name="continue_shopping_url" type="hidden" value="<?php echo $returnURL ?>"> 
<button class="W_E payment" type="submit" id="paymentGoogle"><?php echo $WE_google_button ?></button>
</form>
    <form action="" id="W_E-webEstimate" class="W_E">
		<div class="W_E-demo W_E">
				<div id="W_E-accordion"  class="W_E">
						<h3 class="W_E"> <a href="#"  class="W_E"><?php echo $WE_step1 ?></a> </h3>
						<div id="W_E-sectionOne"  class="W_E">
								<p  class="W_E"><?php echo $WE_intro ?></p>
								<div class="W_E-dots W_E pages">
										<h6  class="W_E"><?php echo $WE_pages_title ?>
												<input type="text" id="W_E-pages" readonly class="W_E" />
										</h6>
										<div  class="W_E">
												<div class="W_E-plusPages W_E" id="W_E-plusPages"></div>
												<div id="W_E-pagesSlider"  class="W_E"></div>
												<div class="W_E-minusPages W_E" id="W_E-minusPages"></div>
										</div>
								</div>
								<div class="W_E-clear W_E"></div>
								<div class="W_E-dots W_E days">
										<h6 class="W_E"><?php echo $WE_days_title ?>
												<input type="text" id="W_E-days" name="W_E-days" readonly class="W_E" />
										</h6>
										<div class="W_E">
												<div class="W_E-plusDays W_E" id="W_E-plusDays"></div>
												<div id="W_E-daysSlider" class="W_E"></div>
												<div class="W_E-minusDays W_E" id="W_E-minusDays"></div>
										</div>
								</div>
								<div class="W_E-clear W_E"></div>
								<div class="W_E-dots W_E W_E_CMS">
										<h6 class="W_E"><?php echo $WE_cms_title ?></h6>
										<p class="W_E"><?php echo $WE_cms_description ?></p>
										<input type="radio" id="W_E-cmsNone" name="cms" value="None" class="W_E W_E-width20"/>
										<label for="W_E-cmsNone" class="W_E-cms W_E"><img src="<?php echo $plugin_dir_path_none ?>" width="30" height="30" alt="None" class="W_E"/> None</label>
										<input type="radio" id="W_E-cms1" name="cms" value="Joomla" class="W_E W_E-width20"/>
										<label for="W_E-cms1" class="W_E-cms W_E"><img src="<?php echo $plugin_dir_path_joomla ?>" width="30" height="30" alt="Joomla" class="W_E"/> Joomla</label>
										<input type="radio" id="W_E-cms2" name="cms" value="WordPress" class="W_E W_E-width20"/>
										<label for="W_E-cms2" class="W_E-cms W_E"><img src="<?php echo $plugin_dir_path_wordpress ?>" width="30" height="30" alt="Wordpress" class="W_E"/> Wordpress</label>
										<input type="radio" id="W_E-cms3" name="cms" value="Drupal" class="W_E W_E-width20"/>
										<label for="W_E-cms3" class="W_E-cms W_E"><img src="<?php echo $plugin_dir_path_drupal ?>" width="30" height="35" alt="Drupal" class="W_E"/> Drupal</label>
										
								</div>
						</div>
						<!-- END SECTION ONE -->
    <h3 class="W_E"> <a href="#" class="W_E"><?php echo $WE_step2 ?></a> </h3>
						<div id="W_E-sectionTwo" class="W_E">
								<div class="W_E-dots W_E design">
										<h6 class="W_E-first W_E"><?php echo $WE_design_title ?>
												<input id="W_E-designPrice" readonly class="W_E  W_E-Cost"/>
										</h6>
										<p class="W_E"><?php echo $WE_design_description ?></p>
										<div class="W_E">
												<input type="radio" id="W_E-designNo" name="design" checked="checked" class="W_E W_E-width20" value="No" disabled="disabled"/>
												<label for="W_E-designNo" class="W_E">No</label>
												<input type="radio" id="W_E-designYes" name="design" class="W_E W_E-width20" value="Yes"/>
												<label for="W_E-designYes" id="W_E-designAdded" class="W_E">Yes</label>
												<input id="W_E-designPrice2" readonly  class="W_E-floatRight W_E-width60 W_E W_E-Cost" />
										</div>
								</div>
								<!-- This is a hidden div to ask design specific questions -->
								<div id="W_E-designHidden" class="W_E">
										<div class="W_E-dots W_E">
												<h6 class="W_E"><?php echo $WE_design_colors ?></h6>
												<textarea id="W_E-colors" name="colors" rows="" cols="" class="W_E"></textarea>
												<br />
												<br />
												<h6 class="W_E"><?php echo $WE_design_sampleSites ?></h6>
												<textarea id="W_E-sitesDescription" name="sitesDescription" rows="" cols="" class="W_E"></textarea>
												<br />
												<br />
												<h6 class="W_E"><?php echo $WE_design_specialInstructions ?></h6>
												<textarea id="W_E-specialDesignInstructions" name="specialDesignInstructions" rows="" cols="" class="W_E"></textarea>
										</div>
								</div>
								<div id="W_E-extrasSection" class="W_E-dots W_E">
										<h6 class="W_E"><?php echo $WE_extra_title ?></h6>
										<p class="W_E"><?php echo $WE_extra_description ?></p>
										
																			
										<input type="checkbox" id="W_E-extra1" name="W_E-extra1" value="<?php echo $WEextra1TXT ?>" class="W_E W_E-width20"/>
										<label id="W_E-extra1txt" class="W_E" for="W_E-extra1"></label>
										
										
										<input type="checkbox" id="W_E-extra2" name="W_E-extra2" value="<?php echo $WEextra2TXT ?>" class="W_E W_E-width20"/>
										<label id="W_E-extra2txt" class="W_E" for="W_E-extra2"></label>
										
										
										<input type="checkbox" id="W_E-extra3" name="W_E-extra3" value="<?php echo $WEextra3TXT ?>" class="W_E W_E-width20"/>
										<label id="W_E-extra3txt" class="W_E" for="W_E-extra3"></label>
										
										
										<input type="checkbox" id="W_E-extra4" name="W_E-extra4" value="<?php echo $WEextra4TXT ?>" class="W_E W_E-width20"/>
										<label id="W_E-extra4txt"  class="W_E" for="W_E-extra4"></label>
										
										
										<input type="checkbox" id="W_E-extra5" name="W_E-extra5" value="<?php echo $WEextra5TXT ?>" class="W_E W_E-width20"/>
										<label id="W_E-extra5txt" class="W_E"  for="W_E-extra5"></label>
										
										
										<input type="checkbox" id="W_E-extra6" name="W_E-extra6" value="<?php echo $WEextra6TXT ?>" class="W_E W_E-width20"/>
										<label id="W_E-extra6txt" class="W_E"  for="W_E-extra6"></label>
										
										
										<input type="checkbox" id="W_E-extra7" name="W_E-extra7" value="<?php echo $WEextra7TXT ?>" class="W_E W_E-width20"/>
										<label id="W_E-extra7txt" class="W_E"  for="W_E-extra7"></label>
										
										
										<input type="checkbox" id="W_E-extra8" name="W_E-extra8" value="<?php echo $WEextra8TXT ?>" class="W_E W_E-width20"/>
										<label id="W_E-extra8txt" class="W_E"  for="W_E-extra8"></label>
										
										
										<input type="checkbox" id="W_E-extra9" name="W_E-extra9"  value="<?php echo $WEextra9TXT ?>" class="W_E W_E-width20"/>
										<label id="W_E-extra9txt" class="W_E"   for="W_E-extra9"></label>
										
										
										<input type="checkbox" id="W_E-extra10" name="W_E-extra10" value="<?php echo $WEextra10TXT ?>" class="W_E W_E-width20"/>
										<label id="W_E-extra10txt" class="W_E"  for="W_E-extra10"></label>
								</div>
						</div>
						
						<!-- END SECTION TWO -->
						
						<h3 class="W_E"> <a href="#" class="W_E"><?php echo $WE_step3 ?></a> </h3>
						<div id="W_E-sectionThree" class="W_E">
								<div class="W_E-dots W_E WEwidget1"><!-- Creates a dotted line -->
										<h6 class="W_E-first W_E"><?php echo $WEwidgettitle1 ?>
												<input id="W_E-imgGalleryPrice" readonly  class="W_E W_E-Cost"/>
										</h6>
										<p class="W_E"><?php echo $WEwidgetTXT1 ?></p>
										<div class="W_E"><!-- Puts a background over the radio buttons and a text. You may need to adjsut the width of this div to keep everything on one line. -->
												
												<input type="radio" id="W_E-imgGalleryNo" name="imgGallery"  class="W_E W_E-width20" disabled="disabled"  checked="checked" value="No"/>
												<label for="W_E-imgGalleryNo" class="W_E">No</label>
												<input type="radio" id="W_E-imgGalleryYes" name="imgGallery" class="W_E W_E-width20"  value="Yes"/>
												<label for="W_E-imgGalleryYes" id="W_E-imgGalleryAdded" class="W_E">Yes</label>
												<input id="W_E-imgGalleryPrice2" readonly class="W_E-floatRight W_E-width60 W_E W_E-Cost"/>
										</div>
								</div>
								<div class="W_E-dots W_E WEwidget2"><!-- Creates a dotted line -->
										<h6 class="W_E"><?php echo $WEwidgettitle2 ?>
												<input id="W_E-slideShowPrice" readonly class="W_E W_E-Cost" />
										</h6>
										<p class="W_E"><?php echo $WEwidgetTXT2 ?></p>
										<div class="W_E"><!-- Puts a background over the radio buttons and a text. You may need to adjsut the width of this div to keep everything on one line. -->
												
												<input type="radio" id="W_E-slideShowNo" name="slideShow" checked="checked"  class="W_E W_E-width20" disabled="disabled"  value="No"/>
												<label for="W_E-slideShowNo" class="W_E">No</label>
												<input type="radio" id="W_E-slideShowYes" name="slideShow" class="W_E W_E-width20"  value="Yes"/>
												<label for="W_E-slideShowYes" id="W_E-slideShowAdded" class="W_E">Yes</label>
												<input id="W_E-slideShowPrice2" readonly  class="W_E-floatRight W_E-width60 W_E W_E-Cost" />
										</div>
								</div>
								<div class="W_E-dots W_E WEwidget3"><!-- Creates a dotted line -->
										<h6 class="W_E"><?php echo $WEwidgettitle3 ?>
												<input id="W_E-lightBoxPrice" readonly class="W_E W_E-Cost"/>
										</h6>
										<p class="W_E"><?php echo $WEwidgetTXT3 ?></p>
										<div class="W_E"><!-- Puts a background over the radio buttons and a text. You may need to adjsut the width of this div to keep everything on one line. -->
												
												<input type="radio" id="W_E-lightBoxNo" name="lightBox" checked="checked"  class="W_E W_E-width20" disabled="disabled"  value="No"/>
												<label for="W_E-lightBoxNo" class="W_E">No</label>
												<input type="radio" id="W_E-lightBoxYes" name="lightBox" class="W_E W_E-width20"  value="Yes"/>
												<label for="W_E-lightBoxYes" id="W_E-lightBoxAdded" class="W_E">Yes</label>
												<input id="W_E-lightBoxPrice2" readonly class="W_E-floatRight W_E-width60 W_E W_E-Cost"  />
										</div>
								</div>
								<div class="W_E-dots W_E WEwidget4"><!-- Creates a dotted line -->
										<h6 class="W_E"><?php echo $WEwidgettitle4 ?>
												<input id="W_E-shareThisPrice" readonly class="W_E W_E-Cost"/>
										</h6>
										<p class="W_E"><?php echo $WEwidgetTXT4 ?></p>
										<div class="W_E"><!-- Puts a background over the radio buttons and a text. You may need to adjsut the width of this div to keep everything on one line. -->
												
												<input type="radio" id="W_E-shareThisNo" name="shareThis" checked="checked"  class="W_E W_E-width20" disabled="disabled"  value="No"/>
												<label for="W_E-shareThisNo" class="W_E">No</label>
												<input type="radio" id="W_E-shareThisYes" name="shareThis" class="W_E W_E-width20"  value="Yes"/>
												<label for="W_E-shareThisYes" id="W_E-shareThisAdded" class="W_E">Yes</label>
												<input id="W_E-shareThisPrice2" readonly class="W_E-floatRight W_E-width60 W_E W_E-Cost" />
												<br />
										</div>
								</div>
    <div class="W_E-dots W_E WEwidget5"><!-- Creates a dotted line -->
										<h6 class="W_E"><?php echo $WEwidgettitle5 ?>
												<input id="W_E-carouselPrice" readonly class="W_E W_E-Cost"/>
										</h6>
										<p class="W_E"><?php echo $WEwidgetTXT5 ?></p>
										<div class="W_E"><!-- Puts a background over the radio buttons and a text. You may need to adjsut the width of this div to keep everything on one line. -->
												
												<input type="radio" id="W_E-carouselNo" name="carousel" checked="checked"  class="W_E W_E-width20" disabled="disabled"  value="No"/>
												<label for="W_E-carouselNo" class="W_E">No</label>
												<input type="radio" id="W_E-carouselYes" name="carousel" class="W_E W_E-width20"  value="Yes"/>
												<label for="W_E-carouselYes" id="W_E-carouselAdded" class="W_E">Yes</label>
												<input id="W_E-carouselPrice2" readonly class="W_E-floatRight W_E-width60 W_E W_E-Cost" />
												<br />
										</div>
								</div>
								<div class="W_E-dots W_E WEwidget6"><!-- Creates a dotted line -->
										<h6 class="W_E"><?php echo $WEwidgettitle6 ?>
												<input id="W_E-accordionPrice" readonly class="W_E W_E-Cost"/>
										</h6>
										<p class="W_E"><?php echo $WEwidgetTXT6 ?></p>
										<div class="W_E"><!-- Puts a background over the radio buttons and a text. You may need to adjsut the width of this div to keep everything on one line. -->
												
												<input type="radio" id="W_E-accordionNo" name="accordion" checked="checked"  class="W_E W_E-width20" disabled="disabled"  value="No"/>
												<label for="W_E-accordion" class="W_E">No</label>
												<input type="radio" id="W_E-accordionYes" name="accordion" class="W_E W_E-width20"  value="Yes"/>
												<label for="W_E-accordionYes" id="W_E-accordionAdded" class="W_E">Yes</label>
												<input id="W_E-accordionPrice2" readonly class="W_E-floatRight W_E-width60 W_E W_E-Cost" />
												<br />
										</div>
								</div>
								<div class="W_E-dots W_E WEwidget7"><!-- Creates a dotted line -->
										<h6 class="W_E"><?php echo $WEwidgettitle7 ?>
												<input id="W_E-customFormsPrice" readonly  class="W_E W_E-Cost"/>
										</h6>
										<p class="W_E"><?php echo $WEwidgetTXT7 ?></p>
										<div class="W_E"><!-- Puts a background over the radio buttons and a text. You may need to adjsut the width of this div to keep everything on one line. -->
												
												<input type="radio" id="W_E-customFormsNo" name="customForms" checked="checked"  class="W_E W_E-width20" disabled="disabled"  value="No"/>
												<label for="W_E-customFormsNo" class="W_E">No</label>
												<input type="radio" id="W_E-customFormsYes" name="customForms" class="W_E W_E-width20"  value="Yes"/>
												<label for="W_E-customFormsYes" id="W_E-customFormsAdded" class="W_E">Yes</label>
												<input id="W_E-customFormsPrice2" readonly class="W_E-floatRight W_E-width60 W_E W_E-Cost" />
												<br />
										</div>
								</div>
								<div class="W_E-dots W_E WEwidget8"><!-- Creates a dotted line -->
										<h6 class="W_E"><?php echo $WEwidgettitle8 ?>
												<input id="W_E-flyOutMenuPrice" readonly class="W_E W_E-Cost" />
										</h6>
										<p class="W_E"><?php echo $WEwidgetTXT8 ?></p>
										<div class="W_E">
												<input type="radio" id="W_E-flyOutMenuNo" name="flyOutMenu" checked="checked"  class="W_E W_E-width20" disabled="disabled"  value="No"/>
												<label for="W_E-flyOutMenuNo" class="W_E">No</label>
												<input type="radio" id="W_E-flyOutMenuYes" name="flyOutMenu" class="W_E W_E-width20"  value="Yes"/>
												<label for="W_E-flyOutMenuYes" id="W_E-flyOutMenuAdded" class="W_E">Yes</label>
												<input id="W_E-flyOutMenuPrice2" readonly class="W_E-floatRight W_E-width60 W_E W_E-Cost" />
												<br />
										</div>
								</div>
						</div>
						
						<!-- END SECTION THREE -->
						
						<h3 class="W_E"> <a href="#" class="W_E"><?php echo $WE_step4 ?></a> </h3>
						<div id="W_E-sectionFour" class="W_E">
								<div class="W_E_loader"><img src="<?php echo $plugin_dir_path_loader ?>"/></div>
								<div class="W_E_message"></div>
								
								<!-- ***********************************
						   YOUR PAYMENT SECTION GOES HERE. 
						******************************** -->
								<div class="W_E-col1 W_E">
										<label for="W_E-firstName" class="W_E"><?php echo $WE_form_firstName ?><span class="W_E-red">*</span></label>
										<input name="firstName" id="W_E-firstName" type="text" class="W_E"/>
										<div class="W_E-clear W_E"></div>
										<label for="W_E-lastName" class="W_E"><?php echo $WE_form_lastName ?><span class="W_E-red">*</span></label>
										<input name="lastName" id="W_E-lastName" type="text" class="W_E"/>
										<div class="W_E-clear W_E"></div>
										<label for="W_E-billingPhone" class="W_E"><?php echo $WE_form_phone ?><span class="W_E-red">*</span></label>
										<input name="billingPhone" id="W_E-billingPhone" type="text" class="W_E"/>
										<div class="W_E-clear W_E"></div>
										<label for="W_E-email" class="W_E"><?php echo $WE_form_email ?><span class="W_E-red">*</span></label>
										<input name="email" id="W_E-email" type="text" class="W_E"/>
										<div class="W_E-clear W_E"></div>
										<label for="W_E-address" class="W_E"><?php echo $WE_form_address ?></label>
										<input name="address" id="W_E-address" type="text" class="W_E"/>
								</div>
								<div class="W_E-col2 W_E">
										<label for="W_E-city" class="W_E"><?php echo $WE_form_city ?></label>
										<input name="city" id="W_E-city" type="text" class="W_E"/>
										<div class="W_E-clear W_E"></div>
										<label for="W_E-state" class="W_E"><?php echo $WE_form_state ?></label>
										<input name="state" id="W_E-state" type="text" class="W_E"/>
										<div class="W_E-clear W_E"></div>
										<label for="W_E-zip" class="W_E"><?php echo $WE_form_zip ?></label>
										<input name="zip" id="W_E-zip" type="text" class="W_E"/>
										<div class="W_E-clear W_E"></div>
										<label for="W_E-country" class="W_E"><?php echo $WE_form_country ?></label>
										<input name="country" id="W_E-country" type="text" class="W_E"/>
								</div>
								<div class="W_E-clear W_E"></div>
								<div id="W_E-buttons" class="W_E">
										<button class="W_E" id="W_E_submit" type="submit"><?php echo $WE_SB ?></button>
										<div class="W_E-clear W_E"></div>
								</div>
						</div>
						<!-- END SECTION FOUR --> 
						
				</div>
				<!-- End Accordion --> 
				
		</div>
		<!--  End demo  -->
		
		<div class="ui-widget W_E-rounded_square W_E W_E-Cost" id="W_E-floatingTotal">
				<h6 class="W_E"><?php echo $WE_order_summary_title ?> </h6>
				<div class="W_E-dots W_E"><label for="W_E-datepicker" class="W_E days"><?php echo $WE_order_summary_date ?></label>
						<input type="text" id="W_E-datepicker" name="W_E-datepicker"  disabled="disabled" class="W_E-width100 W_E days" />
						<div class="W_E-clear W_E"></div>
						<label for="W_E-pages" class="W_E pages"><?php echo $WE_order_summary_pages ?> </label>
						<input type="text" id="W_E-pages2" name="W_E-pages2" readonly  class="W_E-width60 W_E pages"/>
						<div class="W_E-clear W_E"></div>
						<label for="W_E-amount" class="W_E"><?php echo $WE_order_summary_base ?> <span class="W_E-red currency"></span> </label>
						<input type="text"  id="W_E-amount" readonly class="W_E-width60 W_E"/>
						<div class="W_E-clear W_E"></div>
						<label for="W_E-CMS_AMOUNT" class="W_E W_E_CMS"><?php echo $WE_order_summary_CMS  ?><span class="W_E-red currency"></span> </label>
						<input type="text"  id="W_E-CMS_AMOUNT" readonly class="W_E-width60 W_E W_E_CMS"/>
						<div class="W_E-clear W_E"></div>
						<label for="W_E-siteOptions" class="W_E"><?php echo $WE_order_summary_options ?> <span class="W_E-red currency"></span> </label>
						<input type="text"  id="W_E-siteOptions" readonly class="W_E-width60 W_E"/>
						<div class="W_E-clear W_E"></div>
						<label for="W_E-widgets" class="W_E"><?php echo $WE_order_summary_widgets ?> <span class="W_E-red currency"></span> </label>
						<input type="text"  id="W_E-widgets" readonly class="W_E-width60 W_E"/>
						<div class="W_E-clear W_E"></div>
				</div>
				<div class="W_E-dots W_E">
						<label for="W_E-total" class="W_E-total W_E"><?php echo $WE_order_summary_total ?> <span class="W_E-red currency"></span></label>
						<input type="text"  readonly="readonly" class="W_E-width60 W_E-total W_E" id="W_E-total" name="total"/>
				</div>
		</div>
		<input type="hidden" id="W_E-sliderCalc" class="W_E"/>
		
		<!-- Work around to submit disabled radio buttons without  -->
		<input type="hidden" id="WE_myEmail" name="WE_myEmail" value="<?php echo $WE_myEmail ?>"/>
		<input type="hidden" id="designHidden" name="designHidden" value="No"/>
		<input type="hidden" id="imgGalleryHidden" name="imgGalleryHidden" value="No"/>
		<input type="hidden" id="slideShowHidden" name="slideShowHidden" value="No"/>
		<input type="hidden" id="lightboxHidden" name="lightboxHidden" value="No"/>
		<input type="hidden" id="shareThisHidden" name="shareThisHidden" value="No"/>
		<input type="hidden" id="carouselHidden" name="carouselHidden" value="No"/>
		<input type="hidden" id="accordionHidden" name="accordionHidden" value="No"/>
		<input type="hidden" id="customFormsHidden" name="customFormsHidden" value="No"/>
		<input type="hidden" id="flyoutMenuHidden" name="flyoutMenuHidden" value="No"/>
		
		<input type="hidden" id="WE_widget_name_1" name="WE_widget_name_1" value="<?php echo $WEwidgettitle1 ?>"/>
		<input type="hidden" id="WE_widget_name_2" name="WE_widget_name_2" value="<?php echo $WEwidgettitle2 ?>"/>
		<input type="hidden" id="WE_widget_name_3" name="WE_widget_name_3" value="<?php echo $WEwidgettitle3 ?>"/>
		<input type="hidden" id="WE_widget_name_4" name="WE_widget_name_4" value="<?php echo $WEwidgettitle4 ?>"/>
		<input type="hidden" id="WE_widget_name_5" name="WE_widget_name_5" value="<?php echo $WEwidgettitle5 ?>"/>
		<input type="hidden" id="WE_widget_name_6" name="WE_widget_name_6" value="<?php echo $WEwidgettitle6 ?>"/>
		<input type="hidden" id="WE_widget_name_7" name="WE_widget_name_7" value="<?php echo $WEwidgettitle7 ?>"/>
		<input type="hidden" id="WE_widget_name_8" name="WE_widget_name_8" value="<?php echo $WEwidgettitle8 ?>"/>
		<input type="hidden" id="WE_yourMessage" name="WE_yourMessage" value="<?php echo $WE_yourMessage ?>"/>
		<input type="hidden" id="informationSubmitted" name="informationSubmitted" value="<?php echo $informationSubmitted ?>"/>
		<input type="hidden" id="WE_payment_hide" name="WE_payment_hide" value="<?php echo $WE_payment_hide ?>"/>
		
		
		<input type="hidden" id="WE_form_firstName" name="WE_form_firstName" value="<?php echo $WE_form_firstName ?>"/>
		<input type="hidden" id="WE_form_lastName" name="WE_form_lastName" value="<?php echo $WE_form_lastName ?>"/>
		<input type="hidden" id="WE_form_phone" name="WE_form_phone" value="<?php echo $WE_form_phone ?>"/>
		<input type="hidden" id="WE_form_email" name="WE_form_email" value="<?php echo $WE_form_email ?>"/>
		<input type="hidden" id="WE_form_address" name="WE_form_address" value="<?php echo $WE_form_address ?>"/>
		<input type="hidden" id="WE_form_city" name="WE_form_city" value="<?php echo $WE_form_city ?>"/>
		<input type="hidden" id="WE_form_state" name="WE_form_state" value="<?php echo $WE_form_state ?>"/>
		<input type="hidden" id="WE_form_zip" name="WE_form_zip" value="<?php echo $WE_form_zip ?>"/>
		<input type="hidden" id="WE_form_country" name="WE_form_country" value="<?php echo $WE_form_country ?>"/>
		
		<input type="hidden" id="WE_step1" name="WE_step1" value="<?php echo $WE_step1 ?>"/>
		<input type="hidden" id="WE_step2" name="WE_step2" value="<?php echo $WE_step2 ?>"/>
		<input type="hidden" id="WE_step3" name="WE_step3" value="<?php echo $WE_step3 ?>"/>
		<input type="hidden" id="WE_step4" name="WE_step4" value="<?php echo $WE_step4 ?>"/>
		
		<input type="hidden" id="WE_design_title" name="WE_design_title" value="<?php echo $WE_design_title ?>"/>
		<input type="hidden" id="WE_order_summary_date" name="WE_order_summary_date" value="<?php echo $WE_order_summary_date ?>"/>
		<input type="hidden" id="WE_order_summary_title" name="WE_order_summary_title" value="<?php echo $WE_order_summary_title ?>"/>
		<input type="hidden" id="WE_pages_title" name="WE_pages_title" value="<?php echo $WE_pages_title ?>"/>
		<input type="hidden" id="WE_order_summary_CMS" name="WE_order_summary_CMS" value="<?php echo $WE_order_summary_CMS ?>"/>
		<input type="hidden" id="WE_order_summary_total" name="WE_order_summary_total" value="<?php echo $WE_order_summary_total ?>"/>
		<input type="hidden" id="WE_extra_title" name="WE_extra_title" value="<?php echo $WE_extra_title ?>"/>
		
		<input type="hidden" id="WE_hide_cost" name="WE_hide_cost" value="<?php echo $WE_hide_cost ?>"/>
		
</form> </div>
    

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $webEstimatorLink ?>"></script>
<script type="text/javascript">

//Change the currency symbol
var currency = "<?php echo $WE_currency ?>";

//PAYPAL variables....please adjust these variables in order to use paypal:

//NEED YOUR EMAIL HERE
var yourPayPalEmail = "<?php echo $WE_paypal_email ?>";
//NAME YOUR ITEM HERE
var itemName = "<?php echo $WE_paypal_item_name ?>";
//CURRENCY
var currencyCode = "<?php echo $WE_currency_code ?>";
//TITLE OF BUTTON
var payPalButtonName = "<?php echo $WE_paypal_button_text ?>"

//This is the amount that you would charge per page of development. IMPORTANT: THEN multiply that by 10!!!!! 
var pageAmount = <?php echo $WE_page_amount ?>; //I used $100 for this demo.

var designPrice = <?php echo $WE_design_amount ?>;  //determines the amount that you will charge to come up with the design. 

var phoneNumber = "<?php echo $WE_phone_num ?>";


//If the user chooses to use a CMS this is how much you charge to configure and instll that. 
var cmsNone = <?php echo $WE_CMS_none ?>; //do not adjust this amount. 
var cms1Amount = <?php echo $WE_CMS_joomla ?>;
var cms2Amount = <?php echo $WE_CMS_wordpress ?>;
var cms3Amount = <?php echo $WE_CMS_drupal ?>;


//Widgets ---the widgets section includes a lot of common widgets. You can add to this please see me video on how. 
var imgGalleryPrice = <?php echo $WEwidgetPrice1 ?>;
var slideShowPrice = <?php echo $WEwidgetPrice2 ?>;
var lightBoxPrice = <?php echo $WEwidgetPrice3 ?>;
var shareThisPrice = <?php echo $WEwidgetPrice4 ?>;
var carouselPrice = <?php echo $WEwidgetPrice5 ?>;
var accordionPrice = <?php echo $WEwidgetPrice6 ?>;
var customFormsPrice = <?php echo $WEwidgetPrice7 ?>;
var flyOutMenuPrice = <?php echo $WEwidgetPrice8 ?>;

//Extras
var extra1Amount = <?php echo $WEextra1Price ?>;
var extra2Amount = <?php echo $WEextra2Price ?>;
var extra3Amount = <?php echo $WEextra3Price ?>;
var extra4Amount=  <?php echo $WEextra4Price ?>;
var extra5Amount=  <?php echo $WEextra5Price ?>;
var extra6Amount=  <?php echo $WEextra6Price ?>;
var extra7Amount=  <?php echo $WEextra7Price ?>;
var extra8Amount=  <?php echo $WEextra8Price ?>;
var extra9Amount=  <?php echo $WEextra9Price ?>;
var extra10Amount= <?php echo $WEextra10Price ?>;

//Text for extras

var extra1txt = "<?php echo $WEextra1TXT ?>";
var extra2txt = "<?php echo $WEextra2TXT ?>";
var extra3txt = "<?php echo $WEextra3TXT ?>";
var extra4txt="<?php echo $WEextra4TXT ?>";
var extra5txt="<?php echo $WEextra5TXT ?>";
var extra6txt="<?php echo $WEextra6TXT ?>";
var extra7txt="<?php echo $WEextra7TXT ?>";
var extra8txt="<?php echo $WEextra8TXT ?>";
var extra9txt="<?php echo $WEextra9TXT ?>";
var extra10txt="<?php echo $WEextra10TXT ?>";
 
var maxDaysToReduceAmount = <?php echo $WEmaxDays ?>;

var dateFormat = "<?php echo $WE_date_format ?>";
var jQuerydatepicker = jQuery("#W_E-datepicker");
var jQuerydays = jQuery("#W_E-days");
var baseDate = new Date();
var newDate = new Date();
var days = parseInt(jQuerydays.val());
var dateFormat = "<?php echo $WE_date_format ?>";
var date = new Date(baseDate.getTime()); // Calculate the new date
var date2 = date.setDate(date.getDate() + 10);

function resetForms() {
    for (i = 0; i < document.forms.length; i++) {
        document.forms[i].reset();
    }
}

jQuery(document).ready(function(){
	
	resetForms();

	//Only thing needed to activate the estimator. 
	webEstimator();
	
	
	//USED TO SUBMIT FORM TO Contact.php --- 
	//IMPORTANT: on CONTACT.php YOU MUST add your email address
	
	jQuery("form#W_E-webEstimate").bind("submit", function() {
		jQuery(".W_E_loader").show();
		jQuery.post("<?php echo $plugin_dir_path_contact ?>",			
		jQuery("#W_E-webEstimate").serialize(), 
        
		function(reply) {
            jQuery(".W_E_message, #W_E_TopMessage").removeClass().html(reply);
            jQuery(".W_E_loader").hide();
        });
		
		return false;
		
	});
	
	
	jQuerydatepicker.datepicker("setDate", date2); // And set into the datepicker
        jQuerydatepicker.datepicker({
                buttonImageOnly: true,
				dateFormat: dateFormat
        });
	
	jQuery("#W_E-plusDays").trigger("click");
		
});

</script>
<!-- -END COPY AND PASTE!  -->
