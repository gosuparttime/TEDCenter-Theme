function addTwitterBSClass(e){var a=$(e).attr("title");if(a){var t=a.split(" ");if(t[0]){var i=parseInt(t[0]);i>0&&$(e).addClass("label"),2==i&&$(e).addClass("label label-info"),i>2&&4>i&&$(e).addClass("label label-success"),i>=5&&10>i&&$(e).addClass("label label-warning"),i>=10&&$(e).addClass("label label-important")}}else $(e).addClass("label");return!0}var imgSizer={Config:{imgCache:[],spacer:"/path/to/your/spacer.gif"},collate:function(e){var a=!document.all||window.opera||window.XDomainRequest?0:1;if(a&&document.getElementsByTagName){for(var t=imgSizer,i=t.Config.imgCache,n=e&&e.length?e:document.getElementsByTagName("img"),o=0;o<n.length;o++)n[o].origWidth=n[o].offsetWidth,n[o].origHeight=n[o].offsetHeight,i.push(n[o]),t.ieAlpha(n[o]),n[o].style.width="100%";i.length&&t.resize(function(){for(var e=0;e<i.length;e++){var a=i[e].offsetWidth/i[e].origWidth;i[e].style.height=i[e].origHeight*a+"px"}})}},ieAlpha:function(e){var a=imgSizer;e.oldSrc&&(e.src=e.oldSrc);var t=e.src;e.style.width=e.offsetWidth+"px",e.style.height=e.offsetHeight+"px",e.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+t+"', sizingMethod='scale')",e.oldSrc=t,e.src=a.Config.spacer},resize:function(e){var a=window.onresize;window.onresize="function"!=typeof window.onresize?e:function(){a&&a(),e()}}};$(document).ready(function(){$("#tag-cloud a").each(function(){return addTwitterBSClass(this),!0}),$("p.tags a").each(function(){return addTwitterBSClass(this),!0}),$("ol.commentlist a.comment-reply-link").each(function(){return $(this).addClass("btn btn-success btn-mini"),!0}),$("#cancel-comment-reply-link").each(function(){return $(this).addClass("btn btn-danger btn-mini"),!0}),$("article.post").hover(function(){$("a.edit-post").show()},function(){$("a.edit-post").hide()}),$("[data-remote]").on("click",function(e){e.preventDefault();var a=$(this),t=a.data("remote");t&&$(a.data("target")).load(t)}),$("[placeholder]").focus(function(){var e=$(this);e.val()==e.attr("placeholder")&&(e.val(""),e.removeClass("placeholder"))}).blur(function(){var e=$(this);(""==e.val()||e.val()==e.attr("placeholder"))&&(e.addClass("placeholder"),e.val(e.attr("placeholder")))}).blur(),$("[placeholder]").parents("form").submit(function(){$(this).find("[placeholder]").each(function(){var e=$(this);e.val()==e.attr("placeholder")&&e.val("")})}),$("#s").focus(function(){$(window).width()<940&&$(this).animate({width:"200px"})}),$("#s").blur(function(){$(window).width()<940&&$(this).animate({width:"100px"})}),$(".dropdown-toggle").dropdown(),$(".accordion-heading").click(function(){$(".main-nav").find(".accordion-heading a").removeClass("focused"),$(".main-nav").find(".accordion-body.in").collapse("hide"),$(this).children("a").addClass("focused")}),$(".current-menu-item").closest(".accordion-group").children(".accordion-heading").children("a").addClass("focused"),$(".current-menu-item").closest(".accordion-body").collapse("show"),$("#menu a").click(function(e){$("#menu").collapse("hide")}),$("#myCarousel").carousel()});