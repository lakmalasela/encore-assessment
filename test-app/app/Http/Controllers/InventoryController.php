<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function getData(Request $request)
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
                'sales_channels' => 5,
                'markets' => 2,
                'category' => 'Activewear Tops',
                'vendor' => 'Encore'
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
                'vendor' => 'Encore'
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
                'vendor' => 'NextGen'
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
                'vendor' => 'Evergreen'
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
                'vendor' => 'Element'
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
                'vendor' => 'Element'
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
                'vendor' => 'Power'
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
                'vendor' => 'Swift'
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
                'vendor' => 'Swift'
            ]
        ];

        // Filter by status if provided
        $status = $request->query('status');
        if ($status && $status !== 'all') {
            $products = array_filter($products, function($product) use ($status) {
                return strtolower($product['status']) === strtolower($status);
            });
        }

        // Search functionality
        $search = $request->query('search');
        if ($search) {
            $products = array_filter($products, function($product) use ($search) {
                return stripos($product['name'], $search) !== false || 
                       stripos($product['description'], $search) !== false;
            });
        }

        // Pagination
        $page = $request->query('page', 1);
        $perPage = $request->query('per_page', 10);
        $total = count($products);
        $products = array_slice($products, ($page - 1) * $perPage, $perPage);

        return response()->json([
            'data' => array_values($products),
            'pagination' => [
                'current_page' => (int)$page,
                'per_page' => (int)$perPage,
                'total' => $total,
                'total_pages' => ceil($total / $perPage)
            ]
        ]);
    }
}
