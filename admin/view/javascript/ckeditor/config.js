/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	config.language = $(this).attr('data-lang');
	config.filebrowserWindowWidth = '800';
	config.filebrowserWindowHeight = '500';
	config.resize_enabled = true;
	config.resize_dir = 'vertical';
	config.htmlEncodeOutput = false;
	config.entities = false;
	config.extraPlugins = 'opencart,codemirror'; //
	config.codemirror_theme = 'monokai';
	config.toolbar = 'Custom';
	config.allowedContent = true;
	config.startupOutlineBlocks = true;
	config.disableNativeSpellChecker = false;
	config.browserContextMenuOnCtrl = true;
	config.resize_enabled = true;
	config.resize_dir = 'vertical';

	config.toolbar_Custom = [
		['Source'],
		['Maximize'],
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['SpecialChar'],
		'/',
		['Undo','Redo'],
		['Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Link','Unlink','Anchor'],
		['Image','OpenCart','Table','HorizontalRule']
	];
};
