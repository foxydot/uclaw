var mess = new Array(
		'<img src="/sites/all/themes/uclaw/assets/images/production/secondary/studentBanners/prospective1.jpg" alt="Student Profiles" />',
		'<img src="/sites/all/themes/uclaw/assets/images/production/secondary/studentBanners/prospective2.jpg" alt="Student Profiles" />');
var max = mess.length;
var num = Math.floor((Math.random() * max));
document.writeln(mess[num]);
                    