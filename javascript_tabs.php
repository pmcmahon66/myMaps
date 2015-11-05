<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>Untitled Document</title>

<link href="style_tabs.css" rel="stylesheet">
<script type="text/javascript" >
function tabs(selectedtab) {    
    // contents
    var s_tab_content = "tab_content_" + selectedtab;   
    var contents = document.getElementsByTagName("div");
    for(var x=0; x<contents.length; x++) {
        name = contents[x].getAttribute("name");
        if (name == 'tab_content') {
            if (contents[x].id == s_tab_content) {
            contents[x].style.display = "block";                        
            } else {
            contents[x].style.display = "none";
            }
        }
    }   
    // tabs
    var s_tab = "tab_" + selectedtab;       
    var tabs = document.getElementsByTagName("a");
    for(var x=0; x<tabs.length; x++) {
        name = tabs[x].getAttribute("name");
        if (name == 'tab') {
            if (tabs[x].id == s_tab) {
            tabs[x].className = "active";                       
            } else {
            tabs[x].className = "";
            }
        }
    }     
}
</script>
</head>

<body>
<div class="tab_wrap">
    <div class="tabs">
    <ul>
        <li><a name="tab" id="tab_1" href="javascript:void(0)" onClick="tabs(1)" class="active">Popular</a></li>
        <li><a name="tab" id="tab_2" href="javascript:void(0)" onClick="tabs(2)">Recent</a></li>
    </ul>
        
        <div name="tab_content" id="tab_content_1" class="tab_content active">
    <ul>
        <li><a href="#">HTML Techniques<br /><small>2012 10 12</small></a></li>
        <li><a href="#">HTML Techniques<br /><small>2012 10 12</small></a></li>
        <li><a href="#">HTML Techniques<br /><small>2012 10 12</small></a></li>
 
    </ul>
</div>
<div name="tab_content" id="tab_content_2" class="tab_content">
    <ul>
        <li><a href="#">2HTML Techniques<br /><small>2012 10 12</small></a></li>
        <li><a href="#">2HTML Techniques<br /><small>2012 10 12</small></a></li>
        </li>
    </ul>
</div>
</div>
</div>
</body>
</html>