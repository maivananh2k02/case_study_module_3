<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_product')->insert([
            'name_category' => 'Sữa rửa mặt & Toner',
            'desc_category' => 'Gần đây, có nhiều người thắc mắc sản phẩm xuất hiện trong MV "Muộn rồi mà sao còn" là sản phẩm gì? Đối với những ai đã biết đến sản phẩm này thì lại bật cười thích thú khi dòng phụ đề “phát điên rồi làm sao giờ” xuất hiện đúng lúc nam chính xịt toner cấp ẩm với thần thái vô cùng thư giãn. Nhiều khán giả đồn đoán rằng có thể thông điệp chàng ca sĩ muốn gửi đến khán giả là: “Dùng chai toner này sảng khoái đến... phát điên rồi làm sao giờ”. Có ẩn ý hay không thì chưa biết nhưng rõ ràng sự trùng hợp này khiến cho cộng đồng mạng khá tò mò và thíc',
            'status_category' => '1'
        ]);
        DB::table('brands')->insert([
            'name_brand' => 'Gucci',
            'desc_brand' => 'Gần đây, có nhiều người thắc mắc sản phẩm xuất hiện trong MV "Muộn rồi mà sao còn" là sản phẩm gì? Đối với những ai đã biết đến sản phẩm này thì lại bật cười thích thú khi dòng phụ đề “phát điên rồi làm sao giờ” xuất hiện đúng lúc nam chính xịt toner cấp ẩm với thần thái vô cùng thư giãn. Nhiều khán giả đồn đoán rằng có thể thông điệp chàng ca sĩ muốn gửi đến khán giả là: “Dùng chai toner này sảng khoái đến... phát điên rồi làm sao giờ”. Có ẩn ý hay không thì chưa biết nhưng rõ ràng sự trùng hợp này khiến cho cộng đồng mạng khá tò mò và thíc',
            'status_brand' => '1'
        ]);
        DB::table('Products')->insert([
            'name' => 'PREBIOTIC 4-IN-1 MULTICLEANSER',
            'category_id' => '1',
            'brand_id' => '1',
            'desc' => 'Sữa rửa mặt tẩy trang sinh học 4 trong 1',
            'content' => 'Prebiotic 4-In-1 MultiCleanser có dạng nhũ tương. Chính kết cấu đặc biệt này, sản phẩm dễ dàng lấy đi lớp trang điểm cứng đầu nhất, đồng thời xâm nhập vào từng lỗ chân lông để loại bỏ bỏ bụi bẩn và dầu thừa. Đặc biệt là, Prebiotic 4-In-1 MultiCleanser cung cấp prebiotic nhằm cân bằng hệ vi sinh, nuôi dưỡng làn da khỏe mạnh và tạo độ ẩm mướt cho nét da.
Nhiều người sau khi sử dụng sẽ cảm thấy:
Lớp trang điểm khó trôi nhất cũng trôi tuột khỏi làn da chỉ với một lần dùng
Vô cùng dịu nhẹ nhưng vẫn lấy đi hoàn toàn tạp chất
Làn da vừa mềm mại vừa khỏe mạnh sau mỗi lần dùng',
            'price' => '866600',
            'image' => 'https://www.muradvietnam.vn/Data/Sites/1/Product/832/duoc-my-pham-murad_prebiotic_4_in_1_multicleanser.jpg',
            'status' => '1'
        ]);
    }
}
