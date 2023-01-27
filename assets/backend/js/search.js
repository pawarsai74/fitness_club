function searchKeyword(value){
    $.ajax({
        url: _base_url + '/Members/ajax_view',
         type: 'post',
         data:{'search':value},
        success:function(output){
            $('#members_details').html(output);
        }
    });
}
function search(value){
  $.ajax({
    url: _base_url + '/trainer/ajax_search',
    type: 'post',
    data:{'search':value},
    success:function(result){
      $('#trainers_info').html(result);
    }
  });
}
function findAmenities(value){
  $.ajax({
    url: _base_url + '/Amenities/ajax_display',
    type: 'post',
    data:{'search':value},
    success:function(result){
      $('#view_aminities').html(result);
    }
  });
}
function findBlogs(value){
  $.ajax({
    url: _base_url + '/blogs/ajax_view',
    type: 'post',
    data:{'search':value},
    success:function(result){
      $('#blogs_search').html(result);
    }
  });
}
