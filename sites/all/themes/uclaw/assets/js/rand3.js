var mess = new Array(
		'<img src="/sites/all/themes/uclaw/assets/images/production/secondary/studentBanners/current1.jpg" alt="Student Profiles" />',
		'<img src="/sites/all/themes/uclaw/assets/images/production/secondary/studentBanners/current2.jpg" alt="Student Profiles" />',
		'<img src="/sites/all/themes/uclaw/assets/images/production/secondary/studentBanners/current3.jpg" alt="Student Profiles" />');
var max = mess.length;
var num = Math.floor((Math.random() * max));
document.writeln(mess[num]);
                    