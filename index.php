<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nested navigation</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
  <script src="./script.js" defer></script>
</head>
<body>
  <div class="container">
    <nav>
      <div class="mobile-nav">
        <span>Menu</span>
        <div class="nav-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>

      <ul class="nav">
        <?php 
            include 'db.class.php';
            $obj = new Db;
            $result = $obj->query('SELECT * from menu');

            menu($result);

            function menu($data, $parent_id=0){
                foreach ($data as $key => $value) {
                    if ($value['parent'] == $parent_id) {
                        html($data, $value);
                    }
                }
            }


            function html($data, $menu){
                $count = 0;

                foreach ($data as $key => $value) {
                    if ($value['parent'] == $menu['id']) {
                        $count++;
                    }
                }

                if ($count > 0) {
                    echo '<li class=dropdown><a href="#">'.ucfirst($menu['menu_name']).'</a><ul>';
                        menu($data, $menu['id']);
                    echo '</ul></li>';
                }

                else{
                    echo '<li><a href="#">'.ucfirst($menu['menu_name']).'</a></li>';
                    echo '';
                }
            }


        ?>
      </ul>
    </nav>
  </div>
</body>
</html>