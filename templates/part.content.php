<?php
/**
 * @var $_ array
 */
/**
 * @var $l OC_L10N
 */
script(
	$_['appName'],
	[
		'app',
		'vendor/owncloud/share',
		'gallery',
		'galleryutility',
		'galleryconfig',
		'galleryinfobox',
		'galleryview',
		'breadcrumb',
		'galleryalbum',
		'galleryrow',
		'galleryimage',
		'thumbnail',
		'vendor/modified-eventsource-polyfill/eventsource-polyfill',
		'eventsource',
		'vendor/commonmark/dist/commonmark.min',
		'vendor/dompurify/src/purify',
		'vendor/bigshot/bigshot-compressed',
		'slideshow',
		'slideshowcontrols',
		'slideshowzoomablepreview',
		'upload-helper'
	]
);
script(
	'files',
	[
		'upload',
		'file-upload',
		'jquery.fileupload',
		'jquery.iframe-transport'
	]
);

style(
	$_['appName'],
	[
		'styles',
		'share',
		'mobile',
		'github-markdown',
		'slideshow',
		'gallerybutton'
	]
);
style(
	'files',
	[
		'upload'
	]
);
?>
<div id="notification-container">
	<div id="notification" style="display: none;"></div>
</div>
<header>
	<div id="header">
		<a href="<?php print_unescaped(link_to('', 'index.php')); ?>"
		   title="" id="owncloud">
			<div class="logo-icon svg">
			</div>
		</a>

		<div class="header-appname-container">
			<h1 class="header-appname">
				<?php
				if (\OCP\App::isEnabled('enterprise_key')) {
					print_unescaped($theme->getHTMLName());
				} else {
					p($theme->getName());
				}
				?>
			</h1>
		</div>

		<div id="logo-claim" style="display:none;"><?php p($theme->getLogoClaim()); ?></div>
		<div class="header-right">
			<span id="details">
				<?php
				if ($_['server2ServerSharing']) {
					?>
					<span id="save" data-protected="<?php p($_['protected']) ?>"
						  data-owner="<?php p($_['displayName']) ?>"
						  data-name="<?php p($_['filename']) ?>">
									<button id="save-button"><?php p(
											$l->t('Add to your ownCloud')
										) ?></button>
									<form class="save-form hidden" action="#">
										<input type="text" id="remote_address"
											   placeholder="example.com/owncloud"/>
										<button id="save-button-confirm"
												class="icon-confirm svg"></button>
									</form>
								</span>
				<?php } ?>
				<a id="download" class="button">
					<img class="svg" src="<?php print_unescaped(
						image_path('core', 'actions/download.svg')
					); ?>" alt=""/>
						<span id="download-text"><?php p($l->t('Download')) ?>
						</span>
				</a>
			</span>
		</div>
	</div>
</header>
<div id="controls">
	<div id='breadcrumbs'></div>
	<div class="left">
		<!-- sorting buttons -->
		<div id="sort-date-button" class="button sorting right-switch-button">
			<div class="flipper">
				<img class="svg asc front" src="<?php print_unescaped(
					image_path($_['appName'], 'dateasc.svg')
				); ?>" alt="<?php p($l->t('Sort by date')); ?>"/>
				<img class="svg des back" src="<?php print_unescaped(
					image_path($_['appName'], 'datedes.svg')
				); ?>" alt="<?php p($l->t('Sort by date')); ?>"/>
			</div>
		</div>
		<div id="sort-name-button" class="button sorting left-switch-button">
			<div class="flipper">
				<img class="svg asc front" src="<?php print_unescaped(
					image_path($_['appName'], 'nameasc.svg')
				); ?>" alt="<?php p($l->t('Sort by name')); ?>"/>
				<img class="svg des back" src="<?php print_unescaped(
					image_path($_['appName'], 'namedes.svg')
				); ?>" alt="<?php p($l->t('Sort by name')); ?>"/>
			</div>
		</div>
	</div>
	<div id="uploadprogresswrapper">
		<div id="uploadprogressbar"></div>
		<button class="stop icon-close" style="display:none">
			<span class="hidden-visually">
				<?php p($l->t('Cancel upload')) ?>
			</span>
		</button>
	</div>
	<span class="right">
		<!-- sharing button -->
		<div id="share-button" class="button">
			<img class="svg" src="<?php print_unescaped(
				image_path('core', 'actions/share.svg')
			); ?>" alt="<?php p($l->t("Share")); ?>"/>
		</div>
		<a class="share" data-item-type="folder" data-item=""
		   title="<?php p($l->t("Share")); ?>"
		   data-possible-permissions="31"></a>
		<!-- info button -->
		<div id="album-info-button" class="button">
			<span class="ribbon black"></span>
			<img class="svg" src="<?php print_unescaped(
				image_path('core', 'actions/info.svg')
			); ?>" alt="<?php p($l->t('Album information')); ?>"/>
		</div>
		<div class="album-info-container">
			<div class="album-info-loader"></div>
			<div class="album-info-content markdown-body"></div>
		</div>
		<!-- button for opening the current album as file list -->
		<div id="filelist-button" class="button view-switcher gallery">
			<div id="button-loading"></div>
			<img class="svg" src="<?php print_unescaped(
				image_path('core', 'actions/toggle-filelist.svg')
			); ?>" alt="<?php p($l->t('File list')); ?>"/>
		</div>
	</span>
</div>
<div id="content-wrapper">
	<div id="content" class="app-<?php p($_['appName']) ?>"
		 data-albumname="<?php p($_['albumName']) ?>">
		<div id="gallery" class="hascontrols"></div>
		<div id="emptycontent" class="hidden"></div>
		<input type="hidden" name="allowShareWithLink" id="allowShareWithLink" value="yes"/>
		<div class="hiddenuploadfield">
			<input type="file" id="file_upload_start" class="hiddenuploadfield" name="files[]"
				   data-url="<?php print_unescaped($_['uploadUrl']); ?>"/>
		</div>
	</div>
	<footer>
		<p class="info"><?php print_unescaped($theme->getLongFooter()); ?></p>
	</footer>
</div>
