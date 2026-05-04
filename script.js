function searchBooks() {
        var query = document.getElementById('searchInput').value;
        // Check if the query is empty
        if (query.trim() !== "") {
            window.location.href = "books.html?search=" + encodeURIComponent(query);
        } else {
            // If the query is empty, redirect to the books page without any query
            window.location.href = "books.html";
        }
    }
	
	const name = document.getElementById("name");
const email = document.getElementById("email");
const form = document.getElementById("form");
const name_error = document.getElementById("name_error");
const email_error = document.getElementById("email_error");

form.addEventListener("submit",(e)=> 
     {
		alert("Name and email are required fields.");
	if(name.value === ""  || name.value == null)
	{
		e.preventDefault();
		name_error.innerHTML = "Name is required";
	}
	
	var email_check = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	if (!email.value.match(email_check))
	{
		e.preventDefault();
		email_error.innerHTML = "Valid email is required";
		
	}
	})