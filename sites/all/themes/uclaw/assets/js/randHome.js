var mess = new Array(
		'<a href="about/region/index.html"><img src="/sites/all/themes/uclaw/assets/images/production/home/banners/6.jpg" alt="VIBRANT - UC College of Law" /></a>',
		'<a href="prospective/index.html"><img src="/sites/all/themes/uclaw/assets/images/production/home/banners/7.jpg" alt="ACCOMPLISHED - UC College of Law" /></a>',
		'<a href="faculty/index.html"><img src="/sites/all/themes/uclaw/assets/images/production/home/banners/8.jpg" alt="ENGAGED - UC College of Law" /></a>',
		'<a href="current/index.html#tabview=tab0"><img src="/sites/all/themes/uclaw/assets/images/production/home/banners/9.jpg" alt="COLLEGIAL - UC College of Law" /></a>',
		'<a href="institutes/corporate_law/index.html"><img src="/sites/all/themes/uclaw/assets/images/production/home/banners/10.jpg" alt="RELEVANT - UC College of Law" /></a>');
var max = mess.length;
var num = Math.floor((Math.random() * max));
document.writeln(mess[num]);
                    