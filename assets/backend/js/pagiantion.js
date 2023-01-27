$('.pages_no').on('click', function(e) {
  e.preventDefault();
  var pages_no = $(this).attr('id');
// alert(_base_url + '/members/membership?page='+page);
  $.ajax({
      url:  _base_url + '/members/membership?page='+pages_no,
      type:'post',
      success: function(data) {
        $("body").html(data);
      }
  });
});
$('.members_pages').on('click', function(e) {
  e.preventDefault();
  var p_no = $(this).attr('id');
  $.ajax({
      url: _base_url + '/Members/membership?page='+p_no,
      type:'post',
      success: function(data) {
        $("body").fadeOut(0).html(data).fadeIn(0);
      }
  });
});
$('.pages').on('click', function(e) {
  e.preventDefault();
  var p_no = $(this).attr('id');
  $.ajax({
      url: _base_url + '/trainer/show?page='+p_no,
      type:'post',
      success: function(data) {
        $("body").fadeOut(0).html(data).fadeIn(0);
      }
  });
});
$('.ammenities').on('click', function(e) {
  e.preventDefault();
  var abc = $(this).attr('id');
  $(abc).addClass("bg-danger");
  $.ajax({
      url: _base_url + '/amenities/display_amenities?page='+abc,
      type:'post',
      success: function(data) {
        // console.log(_base_url + '/members/membership?page='+page);
        $("body").fadeOut(0).html(data).fadeIn(0);
      }
  });
});
$('.contacts_pages').on('click', function(e) {
  e.preventDefault();
  var abc = $(this).attr('id');
  $.ajax({
      url: _base_url + '/Contact/enquiries?page='+abc,
      type:'post',
      success: function(data) {
        // console.log(_base_url + '/members/membership?page='+page);
        $("body").fadeOut(0).html(data).fadeIn(0);
      }
  });
});
$('.blog_pages').on('click', function(e) {
  e.preventDefault();
  var abc = $(this).attr('id');
  $.ajax({
      url: _base_url + '/blogs/view_blog?page='+abc,
      type:'post',
      success: function(data) {
        // console.log(_base_url + '/members/membership?page='+page);
        $("body").fadeOut(0).html(data).fadeIn(0);
      }
  });
});
