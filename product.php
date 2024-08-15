<?php
	include_once('header.php');
?>
    <style>
        /* Style for the button */
        .rectangle-button.disabled {
            background: transparent;
            pointer-events: none;
        }
        .rectangle-button {
            display: inline-block;
            padding: 10px;
    margin: 5px 5px;
    font-weight: 500;
        min-width: 40px;
    min-height: 40px;
    text-align: center;
    background-color: white;
    color: black;
    cursor: pointer;
    border: 1px solid #BEBEBE;
            border-radius: 4px; /* Border radius for rounded corners */
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Selected state style */
        .rectangle-button.current, .rectangle-button:hover{
           background-color: #E53935;
    
    font-weight: 500;
    color: #F6F6F6;
    border: 0;
        }
        .productdivs{
            cursor: pointer;
        }
        .productdiv{
            text-align: center;
            width: 380px;
    min-height: 482px;
    border-radius: 20px;
    margin-right:50px;
    margin-bottom:50px;
    background: white;
        }
       .search-container {
           width: 436px;
           margin-right: 40px;
    display: flex;
    align-items: center;
}

/* Style the search input */
.search-input {
    color: #A9A9A9;
    min-width: 430px;
    min-height: 50px;
    border: 1px solid #E8E8E8;
    border-radius: 22px;
    padding: 12px 25px;
    /*background-color: transparent;*/
    /*background-image: url('assets/images/searchicon.png');*/
    /*background-repeat: no-repeat;*/
    /*background-position: right 15px center;*/
    /*background-size: 20px;*/
}

.search-input::placeholder {
            color: #999; /* Replace with your desired color code */
        }
.search-input::after {
    content: '\1F50D'; /* Unicode character for the search icon */
    font-family: 'FontAwesome';
    font-size: 20px;
    color: #A9A9A9;
    cursor: pointer;
    margin-left: 10px; /* Adjust the spacing between the input and icon */
}
/* Style the search icon */
.search-icon {
    cursor: pointer;
        background-image: url(assets/images/searchicon.png);
    width: 20px;
    height: 20px;
    margin-left: -46px;
}
.pagination{
    padding-left: 35% !important;
}
@media only screen and (min-width: 768px) and (max-width: 991px), (max-width: 767px) {
.pagination{
      padding-left: 0 !important;
  }
  .productsearch .bbred{
      display:none;
  }
}
    </style>

  <!--====== ABOUT FIVE PART START ======-->
<!-- Start header Area -->
  <section id="hero-area" class="header-area header-image header-eight p-0">
  <img src="assets/images/product.svg"  width=" 100%"/>
    <div class="container">
      <div class="row align-items-center">
	  
       
        <div class="col-lg-6 col-md-12 col-12">
          <div class="header-image">
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End header Area -->
  <!-- ===== service-area start ===== -->
  <section id="services" class="services-area services-eight productsearch">
    <!--======  Start Section Title Five ======-->
<div class="container pb-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold">Explore our personalized gifts</h2>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search products..." class="search-input">
            <i class="fas fa-search search-icon" onclick="performSearch()"></i>
        </div>
    </div>
    <hr class="bbred">
</div>
    <!--======  End Section Title Five ======-->
    <div class="container">
      <div class="row">
      <?php
   ///
   $basePath = 'assets/images/product/';
require_once 'db.php';
// Search and Pagination Logic
$searchProductName = isset($_GET['search']) ? $_GET['search'] : '';
$_SESSION['searchProductName'] = $searchProductName;

$searchCategory = isset($_GET['category']) ? $_GET['category'] : '';
$_SESSION['searchCategory'] = $searchCategory;

$itemsPerPage = 9;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$_SESSION['currentPage'] = $page;
$startIndex = ($page - 1) * $itemsPerPage;

// Modify the query to include search conditions
$sql = "SELECT products.*, categories.name AS category_name 
        FROM products 
        JOIN categories ON products.category_id = categories.id 
        WHERE 1";

if (!empty($searchProductName)) {
    $sql .= " AND products.name LIKE '%$searchProductName%'";
}

if (!empty($searchCategory)) {
    $sql .= " AND categories.name = '$searchCategory'";
}

$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = array(
            'name' => $row['name'],
            'image' => $basePath . $row['image_path'], // Assuming you have an image column in your products table
            'category_name' => $row['category_name']
        );
    }
}

// Close the connection
$conn->close();

// Paginate the products
$paginatedProducts = array_slice($products, $startIndex, $itemsPerPage);

// Render HTML
foreach ($paginatedProducts as $product) {
    echo '<div class="col-lg-4 col-md-6 pb-5 productdivs">';
    echo '<img onclick="openWhatsApp(\'' . $product['name'] . '\')" src="' . $product['image'] . '" />';
    //echo '<p>' . $product['category_name'] . '</p>';
    echo '</div>';
}

// Pagination links
echo '<div class="pagination ">';
$totalPages = ceil(count($products) / $itemsPerPage);

for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $_SESSION['currentPage']) {
        echo '<span class="rectangle-button selected current">' . $i . '</span>';
    } elseif ($i >= $_SESSION['currentPage'] - 2 && $i <= $_SESSION['currentPage'] + 2) {
        echo '<a class="rectangle-button" href="?page=' . $i . '&search=' . urlencode($searchProductName) . '&category=' . urlencode($searchCategory) . '">' . $i . '</a>';
    } elseif ($i == 1 || $i == $totalPages) {
        echo '<a class="rectangle-button" href="?page=' . $i . '&search=' . urlencode($searchProductName) . '&category=' . urlencode($searchCategory) . '">' . $i . '</a>';
    } elseif ($i == $_SESSION['currentPage'] - 3 || $i == $_SESSION['currentPage'] + 3) {
        echo '<span class="ellipsis rectangle-button">...</span>';
    }
}

echo '</div>';
?>
   


        
      </div>
    </div>
  </section>
  <!-- ===== service-area end ===== -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    var searchInput = document.getElementById('searchInput');
    var searchParam = getUrlParam('search');

    if (searchParam !== null) {
        // Decode the search parameter and set it as the value of the search input
        searchInput.value = decodeURIComponent(searchParam);
    }
});
function getUrlParam(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}
function performSearch(){
    var searchInput = document.getElementById('searchInput').value;

    // Modify the search parameter (change this part based on your needs)
    var newSearchParam = encodeURIComponent(searchInput);

    // Reload the page with the updated search parameter
    window.location.href = window.location.pathname + '?page=1&category=&search=' + newSearchParam;
}
function openWhatsApp(productname) {
    // Replace '123456789' with the recipient's phone number (including country code)
    // Replace 'Hello%20World' with the message you want to send (URL encoded)
    var phoneNumber = '919514715045';
    console.log(productname);
    var message = 'Hi, I am interested in the product: ' + productname + '. Can you provide more information?';

    // Create the WhatsApp link
    var whatsappLink = 'https://wa.me/' + phoneNumber + '?text=' + message;

    // Open the link in a new tab/window
    window.open(whatsappLink, '_blank');
}
</script>

<?php
	include_once('footer.php');
?>
 