# Shape Share
http://twitter.com/madebyshape

## Description

jQuery plugin that allows simple and quick implementation of Twitter, Facebook, Pinterest & Google+ sharing. There are no styles included which makes it work with custom styling a lot easier, by simply applying a class and data attribute.

## Usage

Note: This requires jQuery 1.10.x to work correctly. This is not included in the repo but can be downloaded from http://jquery.com or from a Google CDN - https://developers.google.com/speed/libraries/#jquery

### Installing

The content is pulled from "Open Graph" tags. This means that if someone shares your page not via this add-on content is still pulled through in to the social network. So it's important that these tags are added.

```html
<meta property="og:site_name" content="">
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:type" content="">
<meta property="og:image" content="">
<meta property="og:url" content="">
```

```html
<script>
	$(document).ready(function(){
		$('.social-share').shapeShare();
	});
</script>
```

## Options

### General

<table>
	<tr>
		<td><strong>Name</strong></td>
		<td><strong>Type</strong></td>
		<td><strong>Default Value</strong></td>
		<td><strong>Description</strong></td>
	</tr>
	<tr>
		<td>debug</td>
		<td>boolean</td>
		<td>false</td>
		<td>Shows debugging information in the javascript console.</td>
	</tr>
	<tr>
		<td>window</td>
		<td>string</td>
		<td>popup</td>
		<td>Setting this to 'popup' will open the share option in a popup window. Or set it to 'window' to open it in a new window.</td>
	</tr>
	<tr>
		<td>hashtags</td>
		<td>string</td>
		<td>null</td>
		<td>Set hashtags that appear in the content of some social options.</td>
	</tr>
</table>

### Shorten URL

You can make the plugin shorten the URL that is being shared (Particularly useful for share options that have a character count). It uses Bitly (https://bitly.com) to shorten the URL's.

Example:

```html
<script>
	$(document).ready(function(){
		$('.social-share')
			.shapeShare(
				{
					shortenUrl: {
						enable: true,
					}
				}
			);
	});
</script>
```

<table>
	<tr>
		<td><strong>Name</strong></td>
		<td><strong>Type</strong></td>
		<td><strong>Default Value</strong></td>
		<td><strong>Description</strong></td>
	</tr>
	<tr>
		<td>enable</td>
		<td>boolean</td>
		<td>false</td>
		<td>Enable or disable shortening of URL's</td>
	</tr>
	<tr>
		<td>login</td>
		<td>string</td>
		<td>null</td>
		<td>Bitlys API "Login" setting (https://bitly.com/a/settings/advanced)</td>
	</tr>
	<tr>
		<td>apiKey</td>
		<td>string</td>
		<td>null</td>
		<td>Bitlys API "API key" setting (https://bitly.com/a/settings/advanced)</td>
	</tr>
</table>

### Popup Size

Example:

```html
<script>
	$(document).ready(function(){
		$('.social-share')
			.shapeShare(
				{
					popupSize: {
			        	width: '600',
			        	height: '500'
					}
				}
			);
	});
</script>
```

<table>
	<tr>
		<td><strong>Name</strong></td>
		<td><strong>Type</strong></td>
		<td><strong>Default Value</strong></td>
		<td><strong>Description</strong></td>
	</tr>
	<tr>
		<td>width</td>
		<td>integer</td>
		<td>600</td>
		<td>If 'window' is set to 'popup' (Default) this option sets the popup width in pixels.</td>
	</tr>
	<tr>
		<td>height</td>
		<td>integer</td>
		<td>500</td>
		<td>If 'window' is set to 'popup' (Default) this option sets the popup height in pixels.</td>
	</tr>
</table>

### Twitter

If having a share option for Twitter it's important to fill out these options.

Example:

```html
<script>
	$(document).ready(function(){
		$('.social-share')
			.shapeShare(
				{
					twitter: {
						account: 'madebyshape',
						content: 'title'
					}
				}
			);
	});
</script>
```

<table>
	<tr>
		<td><strong>Name</strong></td>
		<td><strong>Type</strong></td>
		<td><strong>Default Value</strong></td>
		<td><strong>Description</strong></td>
	</tr>
	<tr>
		<td>account</td>
		<td>string</td>
		<td>null</td>
		<td>Your Twitter handle / username (Without the @ symbol)</td>
	</tr>
	<tr>
		<td>content</td>
		<td>string</td>
		<td>title</td>
		<td>Lets you decide if 'title' or 'description' should be used in the Twitter content</td>
	</tr>
</table>

## Roadmap
---