<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        // Sample inventory data
        $products = [
            [
                'id' => 1,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIyOP6n1UQ-_8yg7N7qGS-KJ2iR2wpEMxQeQ&s',
                'name' => "Men's Pro Long Sleeve",
                'description' => 'Performance Shirt in DexFlex Lite',
                'status' => 'Draft',
                'inventory' => '0 In Stock',
                'last_update' => null,
                'sales_channels' => 5,
                'markets' => 2,
                'category' => 'Activewear Tops',
                'vendor' => 'Encore',
                'variants' => [
                     ['name' => 'Gray', 'color' => '#9E9E9E', 'size' => 'M', 'stock' => '0 In Stock', 'last_update' => '23 AUG 25', 'price' => '64.00$', 'discount' => 0],
                     ['name' => 'Navy', 'color' => '#001F3F', 'size' => 'L', 'stock' => '0 In Stock', 'last_update' => '23 AUG 25', 'price' => '64.00$', 'discount' => 0],
                ]
            ],
            [
                'id' => 2,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE3pLxFnSsYkTH8d9RhbroKMkwndCG2QZ5Mw&s',
                'name' => "Women's Pro Long Sleeve",
                'description' => 'Performance Shirt in DexFlex Lite',
                'status' => 'Active',
                'inventory' => '73 In Stock For 5 Variants',
                'last_update' => '25 AUG 25',
                'sales_channels' => 6,
                'markets' => 3,
                'category' => 'Activewear Tops',
                'vendor' => 'Encore',
                'variants' => [
                    ['name' => 'Aqua', 'color' => '#00BCD4', 'size' => 'M', 'stock' => '23 In Stock For', 'last_update' => '25 AUG 25', 'price' => '68.00$', 'discount' => 0],
                    ['name' => 'Blue', 'color' => '#2196F3', 'size' => 'L', 'stock' => '10 In Stock For', 'last_update' => '25 AUG 25', 'price' => '68.00$', 'discount' => 0],
                    ['name' => 'Black', 'color' => '#000000', 'size' => 'S', 'stock' => '10 In Stock For', 'last_update' => '25 AUG 25', 'price' => '68.00$', 'discount' => 0],
                    ['name' => 'White', 'color' => '#FFFFFF', 'size' => 'XL', 'stock' => '20 In Stock For', 'last_update' => '25 AUG 25', 'price' => '68.00$', 'discount' => 0],
                    ['name' => 'Green', 'color' => '#4CAF50', 'size' => 'M', 'stock' => '10 In Stock For', 'last_update' => '25 AUG 25', 'price' => '68.00$', 'discount' => 0]
                ]
            ],
            [
                'id' => 3,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTd2JjxOEpDFfnG0kALVjPU5BqBt5wW15S5g&s',
                'name' => "Men's Short Sleeve",
                'description' => 'Performance Shirt in CoolTech Fabric',
                'status' => 'Active',
                'inventory' => '68 In Stock For 18 Variants',
                'last_update' => '25 AUG 25',
                'sales_channels' => 5,
                'markets' => 4,
                'category' => 'Activewear Tops',
                'vendor' => 'NextGen',
                'variants' => [
                    ['name' => 'Navy', 'color' => '#001F3F', 'size' => 'M', 'stock' => '15 In Stock For', 'last_update' => '25 AUG 25', 'price' => '55.00$', 'discount' => 5],
                    ['name' => 'Gray', 'color' => '#808080', 'size' => 'L', 'stock' => '18 In Stock For', 'last_update' => '25 AUG 25', 'price' => '55.00$', 'discount' => 0],
                    ['name' => 'Red', 'color' => '#F44336', 'size' => 'S', 'stock' => '20 In Stock For', 'last_update' => '25 AUG 25', 'price' => '55.00$', 'discount' => 0],
                    ['name' => 'Black', 'color' => '#000000', 'size' => 'XL', 'stock' => '15 In Stock For', 'last_update' => '25 AUG 25', 'price' => '55.00$', 'discount' => 10]
                ]
            ],
            [
                'id' => 4,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRFA0BqBYFRTWlg2gHGCx-T8wVkbZiNI-yPA&s',
                'name' => "Women's Tank Top",
                'description' => 'Breathable Fabric',
                'status' => 'Active',
                'inventory' => '24 In Stock For 23 Variants',
                'last_update' => '25 AUG 25',
                'sales_channels' => 9,
                'markets' => 5,
                'category' => 'Activewear Tops',
                'vendor' => 'Evergreen',
                'variants' => [
                    ['name' => 'Pink', 'color' => '#E91E63', 'size' => 'S', 'stock' => '8 In Stock For', 'last_update' => '25 AUG 25', 'price' => '42.00$', 'discount' => 0],
                    ['name' => 'Purple', 'color' => '#9C27B0', 'size' => 'M', 'stock' => '10 In Stock For', 'last_update' => '25 AUG 25', 'price' => '42.00$', 'discount' => 15],
                    ['name' => 'White', 'color' => '#FFFFFF', 'size' => 'L', 'stock' => '6 In Stock For', 'last_update' => '25 AUG 25', 'price' => '42.00$', 'discount' => 0]
                ]
            ],
            [
                'id' => 5,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcCv7pKurFfzg4K-jWCNm_5Zn5ntd3uP49kg&s',
                'name' => "Men's Full Zip",
                'description' => 'Windbreaker Jacket',
                'status' => 'Active',
                'inventory' => '34 In Stock For 12 Variants',
                'last_update' => '25 AUG 25',
                'sales_channels' => 4,
                'markets' => 2,
                'category' => 'Outerwear',
                'vendor' => 'Element',
                'variants' => [
                    ['name' => 'Olive', 'color' => '#808000', 'size' => 'L', 'stock' => '12 In Stock', 'last_update' => '25 AUG 25', 'price' => '80.00$', 'discount' => 0],
                    ['name' => 'Black', 'color' => '#000000', 'size' => 'M', 'stock' => '10 In Stock', 'last_update' => '25 AUG 25', 'price' => '80.00$', 'discount' => 5],
                    ['name' => 'Gray', 'color' => '#9E9E9E', 'size' => 'XL', 'stock' => '12 In Stock', 'last_update' => '25 AUG 25', 'price' => '80.00$', 'discount' => 0],
                ]
            ],
            [
                'id' => 6,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKtBh8m4JOMhXg5x2nT2avy6d9vg59WgSiPg&s',
                'name' => "Women's Lightweight",
                'description' => 'Hoodie in Soft Fleece',
                'status' => 'Active',
                'inventory' => '18 In Stock For 5 Variants',
                'last_update' => '25 AUG 25',
                'sales_channels' => 3,
                'markets' => 5,
                'category' => 'Outerwear',
                'vendor' => 'Element',
                'variants' => [
                    ['name' => 'Olive', 'color' => '#808000', 'size' => 'L', 'stock' => '12 In Stock', 'last_update' => '25 AUG 25', 'price' => '80.00$', 'discount' => 0],
                    ['name' => 'Black', 'color' => '#000000', 'size' => 'M', 'stock' => '10 In Stock', 'last_update' => '25 AUG 25', 'price' => '80.00$', 'discount' => 5],
                    ['name' => 'Gray', 'color' => '#9E9E9E', 'size' => 'XL', 'stock' => '12 In Stock', 'last_update' => '25 AUG 25', 'price' => '80.00$', 'discount' => 0],
                ]
            ],
            [
                'id' => 7,
                'image' => 'https://thenx.com/cdn/shop/files/thenx_compression_tee1_ls.png?v=1717479151',
                'name' => "Men's Compression",
                'description' => 'Sleeve Top',
                'status' => 'Active',
                'inventory' => '45 In Stock For 2 Variants',
                'last_update' => '25 AUG 25',
                'sales_channels' => 8,
                'markets' => 7,
                'category' => 'Activewear Tops',
                'vendor' => 'Power',
                'variants' => [
                    ['name' => 'Black', 'color' => '#000000', 'size' => 'M', 'stock' => '25 In Stock', 'last_update' => '25 AUG 25', 'price' => '60.00$', 'discount' => 10],
                    ['name' => 'Blue', 'color' => '#2196F3', 'size' => 'L', 'stock' => '20 In Stock', 'last_update' => '25 AUG 25', 'price' => '60.00$', 'discount' => 5]
                ]
            ],
            [
                'id' => 8,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7tb_aDsE9TjQ2TpOk1xS5tatBV3mMwa1JBg&s',
                'name' => "Women's Running",
                'description' => 'Shorts with Pockets',
                'status' => 'Active',
                'inventory' => '23 In Stock For 9 Variants',
                'last_update' => '25 AUG 25',
                'sales_channels' => 11,
                'markets' => 3,
                'category' => 'Activewear Bottoms',
                'vendor' => 'Swift',
                'variants' => [
                    ['name' => 'Black', 'color' => '#000000', 'size' => 'S', 'stock' => '8 In Stock', 'last_update' => '25 AUG 25', 'price' => '45.00$', 'discount' => 0],
                    ['name' => 'Blue', 'color' => '#2196F3', 'size' => 'M', 'stock' => '7 In Stock', 'last_update' => '25 AUG 25', 'price' => '45.00$', 'discount' => 5],
                    ['name' => 'Gray', 'color' => '#9E9E9E', 'size' => 'L', 'stock' => '8 In Stock', 'last_update' => '25 AUG 25', 'price' => '45.00$', 'discount' => 0],
                ]
            ],
            [
                'id' => 9,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNIImTfAUmHuIEj8PhAHFeVhayDiQxoakG_g&s',
                'name' => "Men's Jogger",
                'description' => 'Pants in Performance Fabric',
                'status' => 'Active',
                'inventory' => '98 In Stock For 25 Variants',
                'last_update' => '25 AUG 25',
                'sales_channels' => 12,
                'markets' => 8,
                'category' => 'Activewear Bottoms',
                'vendor' => 'Swift',
                'variants' => [
                    ['name' => 'Black', 'color' => '#000000', 'size' => 'M', 'stock' => '35 In Stock', 'last_update' => '25 AUG 25', 'price' => '65.00$', 'discount' => 0],
                    ['name' => 'Navy', 'color' => '#001F3F', 'size' => 'L', 'stock' => '33 In Stock', 'last_update' => '25 AUG 25', 'price' => '65.00$', 'discount' => 10],
                    ['name' => 'Gray', 'color' => '#9E9E9E', 'size' => 'XL', 'stock' => '30 In Stock', 'last_update' => '25 AUG 25', 'price' => '65.00$', 'discount' => 0]
                ]
            ]
        ];
        
        return view('dashboard', compact('products'));
    }

    // public function getData(Request $request)
    // {
    //     // Sample inventory data
    //     $products = [
    //         [
    //             'id' => 1,
    //             'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIyOP6n1UQ-_8yg7N7qGS-KJ2iR2wpEMxQeQ&s',
    //             'name' => "Men's Pro Long Sleeve",
    //             'description' => 'Performance Shirt in DexFlex Lite',
    //             'status' => 'Draft',
    //             'inventory' => '0 In Stock',
    //             'sales_channels' => 5,
    //             'markets' => 2,
    //             'category' => 'Activewear Tops',
    //             'vendor' => 'Encore'
    //         ],
    //         [
    //             'id' => 2,
    //             'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE3pLxFnSsYkTH8d9RhbroKMkwndCG2QZ5Mw&s',
    //             'name' => "Women's Pro Long Sleeve",
    //             'description' => 'Performance Shirt in DexFlex Lite',
    //             'status' => 'Active',
    //             'inventory' => '73 In Stock For 5 Variants',
    //             'last_update' => '25 AUG 25',
    //             'sales_channels' => 6,
    //             'markets' => 3,
    //             'category' => 'Activewear Tops',
    //             'vendor' => 'Encore'
    //         ],
    //         [
    //             'id' => 3,
    //             'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTd2JjxOEpDFfnG0kALVjPU5BqBt5wW15S5g&s',
    //             'name' => "Men's Short Sleeve",
    //             'description' => 'Performance Shirt in CoolTech Fabric',
    //             'status' => 'Active',
    //             'inventory' => '68 In Stock For 18 Variants',
    //             'last_update' => '25 AUG 25',
    //             'sales_channels' => 5,
    //             'markets' => 4,
    //             'category' => 'Activewear Tops',
    //             'vendor' => 'NextGen'
    //         ],
    //         [
    //             'id' => 4,
    //             'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRFA0BqBYFRTWlg2gHGCx-T8wVkbZiNI-yPA&s',
    //             'name' => "Women's Tank Top",
    //             'description' => 'Breathable Fabric',
    //             'status' => 'Active',
    //             'inventory' => '24 In Stock For 23 Variants',
    //             'last_update' => '25 AUG 25',
    //             'sales_channels' => 9,
    //             'markets' => 5,
    //             'category' => 'Activewear Tops',
    //             'vendor' => 'Evergreen'
    //         ],
    //         [
    //             'id' => 5,
    //             'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcCv7pKurFfzg4K-jWCNm_5Zn5ntd3uP49kg&s',
    //             'name' => "Men's Full Zip",
    //             'description' => 'Windbreaker Jacket',
    //             'status' => 'Active',
    //             'inventory' => '34 In Stock For 12 Variants',
    //             'last_update' => '25 AUG 25',
    //             'sales_channels' => 4,
    //             'markets' => 2,
    //             'category' => 'Outerwear',
    //             'vendor' => 'Element'
    //         ],
    //         [
    //             'id' => 6,
    //             'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKtBh8m4JOMhXg5x2nT2avy6d9vg59WgSiPg&s',
    //             'name' => "Women's Lightweight",
    //             'description' => 'Hoodie in Soft Fleece',
    //             'status' => 'Active',
    //             'inventory' => '18 In Stock For 5 Variants',
    //             'last_update' => '25 AUG 25',
    //             'sales_channels' => 3,
    //             'markets' => 5,
    //             'category' => 'Outerwear',
    //             'vendor' => 'Element'
    //         ],
    //         [
    //             'id' => 7,
    //             'image' => 'https://thenx.com/cdn/shop/files/thenx_compression_tee1_ls.png?v=1717479151',
    //             'name' => "Men's Compression",
    //             'description' => 'Sleeve Top',
    //             'status' => 'Active',
    //             'inventory' => '45 In Stock For 2 Variants',
    //             'last_update' => '25 AUG 25',
    //             'sales_channels' => 8,
    //             'markets' => 7,
    //             'category' => 'Activewear Tops',
    //             'vendor' => 'Power'
    //         ],
    //         [
    //             'id' => 8,
    //             'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7tb_aDsE9TjQ2TpOk1xS5tatBV3mMwa1JBg&s',
    //             'name' => "Women's Running",
    //             'description' => 'Shorts with Pockets',
    //             'status' => 'Active',
    //             'inventory' => '23 In Stock For 9 Variants',
    //             'last_update' => '25 AUG 25',
    //             'sales_channels' => 11,
    //             'markets' => 3,
    //             'category' => 'Activewear Bottoms',
    //             'vendor' => 'Swift'
    //         ],
    //         [
    //             'id' => 9,
    //             'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNIImTfAUmHuIEj8PhAHFeVhayDiQxoakG_g&s',
    //             'name' => "Men's Jogger",
    //             'description' => 'Pants in Performance Fabric',
    //             'status' => 'Active',
    //             'inventory' => '98 In Stock For 25 Variants',
    //             'last_update' => '25 AUG 25',
    //             'sales_channels' => 12,
    //             'markets' => 8,
    //             'category' => 'Activewear Bottoms',
    //             'vendor' => 'Swift'
    //         ]
    //     ];

    //     // Filter by status if provided
    //     $status = $request->query('status');
    //     if ($status && $status !== 'all') {
    //         $products = array_filter($products, function($product) use ($status) {
    //             return strtolower($product['status']) === strtolower($status);
    //         });
    //     }

    //     // Search functionality
    //     $search = $request->query('search');
    //     if ($search) {
    //         $products = array_filter($products, function($product) use ($search) {
    //             return stripos($product['name'], $search) !== false || 
    //                    stripos($product['description'], $search) !== false;
    //         });
    //     }

    //     // Pagination
    //     $page = $request->query('page', 1);
    //     $perPage = $request->query('per_page', 10);
    //     $total = count($products);
    //     $products = array_slice($products, ($page - 1) * $perPage, $perPage);

    //     return response()->json([
    //         'data' => array_values($products),
    //         'pagination' => [
    //             'current_page' => (int)$page,
    //             'per_page' => (int)$perPage,
    //             'total' => $total,
    //             'total_pages' => ceil($total / $perPage)
    //         ]
    //     ]);
    // }
}
