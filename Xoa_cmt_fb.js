//auto confirm
confirm = () => true
// Chạy jquery trong source


// C1: Lấy hết dữ liệu rồi xóa n~ cmt có "*"
//delay 2s; js - jquery
let chuoi, nut, nut_them_cmt;
function process(elements, cb, timeout) {
	var i = 0;
	var l = elements.length;
	(function fn() {
		cb.call(elements[i++]);
		if(i<l){
			setTimeout(fn, timeout);
		}
	}());
}
// xóa cmt có "*"
process($("div._2a_i"), function(){
// Lấy tất cả cmt đã tải trc
chuoi = $(this).find('div[data-sigil="comment-body"]').text(); 
// Ktra cmt nào có dấu " * ", thì click vô xem thêm(see more)
	if(chuoi.includes("*")){
		// click vô thêm thêm (seemore);
		nut = $(this).find('a._1l26._2b0a');
		nut[0].click();
		// click vô Xóa (Delete)
		$("a._54k8._55i1._58a0.touchable:contains(Xóa)")[0].click();	// Để tiếng anh thì là "Delete" thay vì "Xóa"
	}
}, 2000); 

//tai them cmt
let ok = 1;
while(ok){
	let nut_them_cmt = $("a._108_");
	// console.log(nut_them_cmt.length);
	if(!nut_them_cmt.length){
		ok = 0;
		// console.log(ok);
	}else{
		nut_them_cmt[0].click();
		// console.log(ok);
	}
}

let nut_them_cmt = $("a._108_");
function load_cmt(nut_them_cmt){
	nut_them_cmt[0].click();
	console.log("Đã click");
	nut_them_cmt_2 = $("a._108_");
	if(nut_them_cmt_2.length){
		console.log("load_cmt");
		load_cmt(nut_them_cmt_2);
	}
}
load_cmt(nut_them_cmt);

while(true){
	$("a._108_").click();
	console.log("Đã thêm");
	if(!$("a._108_")){
		break;
	}
}

	
// }












// setTimeout(() => { abc }, 2000);



// xóa liên tục
let chuoi, nut;
$("div._2a_i").each(function(){
// Lấy tất cả cmt
chuoi = $(this).find('div[data-sigil="comment-body"]').text(); 
// Ktra cmt nào có dấu " * ", thì click vô xem thêm(see more)
	if(chuoi.includes("*")){
		// click vô thêm thêm (seemore);
		nut = $(this).find('a._1l26._2b0a');
		nut[0].click();
		// click vô Xóa (Delete)
		$("a._54k8._55i1._58a0.touchable:contains(Xóa)")[0].click();	// Để tiếng anh thì là "Delete" thay vì "Xóa"
	}
});