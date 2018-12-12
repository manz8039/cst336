$('document').ready(function() {

    function startWebsite() {
        setUpHome();
        setUpLogin();
        setUpAdmin();
        showPage("#home");
    }
    
    // handler function that displays argument page id
    function showPage(section) {
        $("#home").hide();
        $("#login").hide();
        $("#admin").hide();
        $(section).show();
    }
    
    // setting up all page scenarios
    function setUpHome() {
        $.ajax({
            type: "GET",
            url: "inc/getStyles.php",
            dataType: "json",
            data: {"filler" : "filler"},
            success: function(data, status) { 
                $("#style-option").append("<option value=''>FIGHT STYLE</option>");
                for (i in data) {
                    $("#style-option").append("<option value=" + data[i]["styleId"] + ">" + data[i]["styleCategory"] + "</option>");
                }
            }
        });
        
        $.ajax({
            type: "GET",
            url: "inc/getWeights.php",
            dataType: "json",
            data: {"filler" : "filler"},
            success: function(data, status) { 
                $("#weight-option").append("<option value=''>WEIGHT CLASS</option>");
                for (i in data) {
                    $("#weight-option").append("<option value=" + data[i]["weightId"] + ">" + data[i]["weightCategory"] + "</option>");
                }
            }
        });
    }
    function setUpLogin() {
        $("#access-button").click(function() {
           if ($("#userfield").val() != "admin") $("#userlog").html("Incorrect username");
           else $("#userlog").html("");
           
           if ($("#passfield").val() != "secret") $("#passlog").html("Incorrect password");
           else $("#passlog").html("");
           
           if ($("#userfield").val() == "admin" && $("#passfield").val() == "secret") {
                showPage("#admin");    
           }
        });
    }
    
    function calculateAggregate() {
        $.ajax({
            type: "GET",
            url: "inc/getFighters.php",
            dataType: "json",
            data: {"filler" : "filler"},
            success: function(data, status) { 
                $("#total-fighters").html(data["COUNT(*)"]);
            }
        });
        $.ajax({
            type: "GET",
            url: "inc/getBrawlers.php",
            dataType: "json",
            data: {"filler" : "filler"},
            success: function(data, status) { 
                $("#total-brawlers").html(data["COUNT(*)"]);
            }
        });
        $.ajax({
            type: "GET",
            url: "inc/getGunners.php",
            dataType: "json",
            data: {"filler" : "filler"},
            success: function(data, status) { 
                $("#total-gunners").html(data["COUNT(*)"]);
            }
        });
        $.ajax({
            type: "GET",
            url: "inc/getSwordfighters.php",
            dataType: "json",
            data: {"filler" : "filler"},
            success: function(data, status) { 
                $("#total-swordfighters").html(data["COUNT(*)"]);
            }
        });
    }

    
    function setUpAdmin() {
        $("#addPage").toggle();
        $("#aggregatePage").toggle();
        $("#editPage").toggle();
        $("#add-button").click(function() {
            $("#addPage").toggle();
        });
        
        $("#aggregate-button").click(function() {
            calculateAggregate();
           $("#aggregatePage").toggle();
        });
        
        $("#logout-button").click(function() {
           showPage("#login"); 
        });
        
        $("#insert-button").click(function() {
            $.ajax({
                type: "GET",
                url: "inc/insertFighter.php",
                dataType: "json",
                data: {
                    "name" : $("[name=newName]").val(),
                    "weight" : $("[name=newWeight]").val(),
                    "style" : $("[name=newStyle]").val(),
                    "game" : $("[name=newGame]").val(),
                    "description" : $("[name=newDescription]").val(),
                    "image" : $("[name=newImage]").val()
                },
                success: function(data, status) { 
                    console.log("Successfully added data");
                    alert("A new challenger approaches!!");
                },
                complete: function(data,status) {
                    alert("No");
                }
            });
            $("#editPage").toggle();
        });
        
        $("#editPage").click(function() {
            $("#editPage").html();
            
        });
    }
    
    
    
    // navigation bar buttons
    $("#home-button").click(function() {
        showPage("#home");
    });
    
    $("#login-button").click(function() {
        showPage("#login");
    });
    
    $("#search-button").click(function() {
        console.log("Hello");
        var a = $("#keyword").val();
        var b = $("[name=style]").val();
        var c = $("[name=weight]").val();
        var d = $("[name=category]:checked").val();
        var e = $("[name=order]:checked").val();
        console.log(a);
        console.log(b);
        console.log(c);
        console.log(d);
        console.log(e);
        $.ajax({
            type: "GET",
            url: "inc/getResults.php",
            dataType: "json",
            data: {
                "keyword" : $("#keyword").val(),
                "style" : Number($("[name=style]").val()),
                "weight" : Number($("[name=weight]").val()),
                "category" : $("[name=category]:checked").val(),
                "order" : $("[name=order]:checked").val()
            },
            success: function(data, status) { 
                $("#search-results").empty();
                for (i in data) {
                    console.log(data[i]["fighterName"]);
                    $("#search-results").append("<div id='" + data[i]["fighterId"] + "' class='fighter'>");
                    $("#" + data[i]["fighterId"]).append("<img class='fighter-image' src='" + data[i]["fighterImage"] + "' width='250' height='300'>");
                    $("#" + data[i]["fighterId"]).append("<p><strong>Name: " + data[i]["fighterName"] + "</strong><p>");
                    $("#" + data[i]["fighterId"]).append("<p><strong>Game: " + data[i]["fighterGame"] + "</strong><p>");
                    $("#" + data[i]["fighterId"]).append("<p><strong>Style: " + data[i]["styleCategory"] + "</strong><p>");
                    $("#" + data[i]["fighterId"]).append("<p><strong>Weight: " + data[i]["weightCategory"] + "</strong><p>");
                    $("#" + data[i]["fighterId"]).append("<p><strong>" + data[i]["fighterDescription"] + "</strong><p>");
                    $("#search-results").append("</div>");
                }
            },
            complete: function(data, status) {
            }
        });
    });

window.onload = startWebsite();
});


