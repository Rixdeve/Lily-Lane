<?php require '../Includes/header.php';
require '../Includes/db.php';
try {
    $sql_watch = "SELECT * FROM product WHERE category = 'Watch' AND product_availability = 1 LIMIT 4";
    $stmt = $conn->prepare($sql_watch);
    $stmt->execute();
    $watches = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql_perfume = "SELECT * FROM product WHERE category = 'Perfume' AND product_availability = 1 LIMIT 4";
    $stmt = $conn->prepare($sql_perfume);
    $stmt->execute();
    $perfumes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/tailwind.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Lily Lane | Home</title>
</head>

<body>
    <div class="w-screen"><img src="/Aura/src/assets/images/lilylane banner.png" alt="banner"></div>


    <div class="container mx-auto px-6 py-12">
        <h2 class="text-2xl font-bold text-center mb-6">Shop Latest</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Display Watches -->
            <?php foreach ($watches as $product): ?>
                <div class="bg-white shadow-md rounded-lg overflow-hidden border">
                    <img src="<?php echo htmlspecialchars($product['img_url']); ?>" class="w-full h-56 object-contain">
                    <div class="p-4">
                        <p class="text-gray-500 text-sm"><?php echo htmlspecialchars($product['brand']); ?></p>
                        <p class="font-bold text-lg"><?php echo htmlspecialchars($product['product_name']); ?></p>
                        <div class="flex items-center mt-2">
                            <span
                                class="text-lg font-semibold text-gray-900">Rs.<?php echo number_format($product['price'], 2); ?></span>
                            <?php if (!empty($product['discounted_price']) && $product['discounted_price'] < $product['price']): ?>

                            <?php endif; ?>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <a href="../../Aura/src/Includes/viewitem.php?product_id=<?php echo $product['product_id']; ?>"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700">
                                View Details
                            </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php foreach ($perfumes as $product): ?>
                <div class="bg-white shadow-md rounded-lg overflow-hidden border">
                    <img src="<?php echo htmlspecialchars($product['img_url']); ?>" class="w-full h-56 object-contain">
                    <div class="p-4">
                        <p class="text-gray-500 text-sm"><?php echo htmlspecialchars($product['brand']); ?></p>
                        <p class="font-bold text-lg"><?php echo htmlspecialchars($product['product_name']); ?></p>
                        <div class="flex items-center mt-2">
                            <span
                                class="text-lg font-semibold text-gray-900">Rs.<?php echo number_format($product['price'], 2); ?></span>
                            <?php if (!empty($product['discounted_price']) && $product['discounted_price'] < $product['price']): ?>

                            <?php endif; ?>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <a href="../../Aura/src/Includes/viewitem.php?product_id=<?php echo $product['product_id']; ?>"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700">
                                View Details
                            </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="relative w-full h-[450px] bg-cover bg-center"
        style="background-image: url('../public/images/background.png');">
        <div class="absolute inset-0 flex items-center justify-center">
            <a href="../src/Pages/watchshop.php"><button
                    class="px-6 py-2 bg-white text-black font-semibold rounded-md shadow-md hover:bg-gray-200 transition">
                    Buy
                </button></a>
        </div>
    </div>

    <div class="w-full h-64 bg-gray-300 p-12">
        <div class="max-w-5xl mx-auto grid grid-cols-3 text-center text-black font-semibold mt-16">
            <div>
                <p>Diverse Product Range</p>
            </div>
            <div>
                <p>Secure Transactions</p>
            </div>
            <div>
                <p>Streamlined Returns</p>
            </div>
        </div>
    </div>
    <?php require '../src/Includes/footer.php';
    ?>
</body>

</html>