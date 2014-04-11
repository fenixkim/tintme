tintme (beta)
======

This service is useful when you need to change the solid color of your images that with transparent backgrounds such as icons and logos for a website. With a simple call to [tintme.co](http://tintme.co) you can do it. Example, Let's change the color of this image:

![image](https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/shared-128.png)
<img valign="top" style="margin:50px 30px;" src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/forward-24.png">
![image](http://tintme.co/?c=77AAF0&u=https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/shared-128.png)

_© Icons from [iconfinder.com](https://www.iconfinder.com/search/?q=iconset:ios-7-icons)_

## Usage

Call the following url and replace the variables `{...}`:

	http://tintme.co/?c={HEX_COLOR}&u={MY_OLD_ABSOLUTE_IMAGE_URL}

You can call **tintme** directly from a `img` tag:

	<img src="http://tintme.co/?c=FF0&u=http:://domain.com/path/to/my/untinted/image.png">
	
You can get the url of the colored image using the parameter `p=1`. When you call:

	http://tintme.co/?c=FF0&p=1&u={MY_OLD_ABSOLUTE_IMAGE_URL}">

You'll get the url in plain text like this:

	http://tintme.co/i/0a85570691270aebbd979a17f6519a9c.png

## Parameters

### c _(hex)_

Color in hexadecimal format without `#` or `0x`. Eg: `FF0000` to get in a solid red:

	http://tintme.co/?c=FF0000
	
### u _(string)_

The absolute URL of the image you want to tint.

### p _(bool)_

If this parameter is set to true an answer in plain text with the absolute URL of the colored image is obtained.

	http://tintme.co/?c=FF0000&p=true
	
## Roadmap

* Upload images to a AWS S3
* Add CDN support
* Pretty URLs

## License

Copyright 2014 Alexander Ruiz Ponce

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.


