document.addEventListener('DOMContentLoaded', function () {
  var hasSubmenu = document.querySelectorAll('.has-submenu');
  
  hasSubmenu.forEach(function (item) {
      item.addEventListener('mouseover', function () {
          this.querySelector('.submenu').style.display = 'block';
      });

      item.addEventListener('mouseout', function () {
          this.querySelector('.submenu').style.display = 'none';
      });
  });
});
