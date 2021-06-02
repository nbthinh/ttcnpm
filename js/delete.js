function delete_book_manager(page_next){
	delete_obj = document.getElementsByClassName("checked_book_manager");
	delete_element = "";
	for (var i = 0 ; i < delete_obj.length; i++){
		if (delete_obj[i].checked == true){
			delete_element = (delete_element == "")?parseInt(delete_obj[i].id).toString():(delete_element + "_" + parseInt(delete_obj[i].id).toString());
		}
	}
	window.location.href="./process.php?state=delete_book&id="+delete_element+"&page="+page_next;
}