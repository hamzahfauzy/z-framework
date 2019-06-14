var is_focus = false;
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
			el = document.querySelector(".form-error."+this.name);
			el.classList.add("active")
			document.querySelector("[name="+this.name+"]").classList.add("is-invalid")
			if(!is_focus)
			{
				document.querySelector("[name="+this.name+"]").focus()
				is_focus = true
			}
			return false;
			// alert("there is invalid field")
            // e.target.setCustomValidity("");
            // if (!e.target.validity.valid) {
            //     e.target.setCustomValidity("no message");
            // }
        };

        elements[i].onvalid = function(e) {
			is_focus = false
        };

        elements[i].onblur = function(e){
        	is_focus = false
        };

        elements[i].oninput = function(e) {
        	is_focus = false
			el = document.querySelector(".form-error."+this.name);
			el.classList.remove("active")
			document.querySelector("[name="+this.name+"]").classList.remove("is-invalid")
        };
    }

    var elements = document.getElementsByTagName("TEXTAREA");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            el = document.querySelector(".form-error."+this.name);
            el.classList.add("active")
            document.querySelector("[name="+this.name+"]").classList.add("is-invalid")
            if(!is_focus)
            {
                document.querySelector("[name="+this.name+"]").focus()
                is_focus = true
            }
            return false;
            // alert("there is invalid field")
            // e.target.setCustomValidity("");
            // if (!e.target.validity.valid) {
            //     e.target.setCustomValidity("no message");
            // }
        };

        elements[i].onvalid = function(e) {
            is_focus = false
        };

        elements[i].onblur = function(e){
            is_focus = false
        };

        elements[i].oninput = function(e) {
            is_focus = false
            el = document.querySelector(".form-error."+this.name);
            el.classList.remove("active")
            document.querySelector("[name="+this.name+"]").classList.remove("is-invalid")
        };
    }

    var elements = document.getElementsByTagName("SELECT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            el = document.querySelector(".form-error."+this.name);
            el.classList.add("active")
            document.querySelector("[name="+this.name+"]").classList.add("is-invalid")
            if(!is_focus)
            {
                document.querySelector("[name="+this.name+"]").focus()
                is_focus = true
            }
            return false;
            // alert("there is invalid field")
            // e.target.setCustomValidity("");
            // if (!e.target.validity.valid) {
            //     e.target.setCustomValidity("no message");
            // }
        };

        elements[i].onvalid = function(e) {
            is_focus = false
        };

        elements[i].onblur = function(e){
            is_focus = false
        };

        elements[i].oninput = function(e) {
            is_focus = false
            el = document.querySelector(".form-error."+this.name);
            el.classList.remove("active")
            document.querySelector("[name="+this.name+"]").classList.remove("is-invalid")
        };
    }
})