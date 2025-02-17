<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book1 = Book::create([
            'category_id' => Category::where('name', 'ريادة الأعمال')->first()->id,
            'publisher_id' => Publisher::where('name', 'أكاديمية حسوب')->first()->id,
            'title' => 'التوظيف عن بعد',
            'description' => 'في السنوات الأخيرة انتشر على الصعيد العالمي نظام العمل عن بُعد، حيث تلجأ العديد من الشركات والمؤسسات – وكذلك الأفراد – إلى الاستعانة بأفراد يعملون عن بُعد من المنزل أو أي مكان في العالم عبر الإنترنت.
            تلجأ الشركات إلى العاملين عن بُعد في مختلف التخصصات، منها على سبيل المثال لا الحصر العاملين في مجال البرمجة، وتحرير النصوص، والتسويق الشبكي، والتسويق الإلكتروني،  والهندسة، والتصميم والإعلانات، والترجمة، والديكور الداخلي، وإدخال البيانات، وبعض أعمال السكرتارية، وحجز تذاكر الطيران، وكتابة المقالات، وبعض أعمال العلاقات العامة عبر الإنترنت، وتصميم المواقع الإلكترونية وإدارة المواقع الإلكترونية، والدراسات والتحاليل السوقية وغيرها من التخصصات.
            
            ولابُد أن السؤال الذي يبادرنا هو: لماذا كل هذه الأهمية لنظام العمل عن بُعد، وكيف يمكنني الاستفادة من هذا النظام في مؤسستي؟
            تعالوا لنتعرف معاً على الجواب من خلال هذا الكتاب',
            'number_of_copies' => '300',
            'number_of_pages' => '288',
            'price' => '17',
            'isbn'=>'100000000000',
            'cover_image' => 'images/covers/1.png',
        ]);
        $book1->authors()->attach(Author::where('name', 'فاطمة حيشية')->first());

        $book2 = Book::create([
            'category_id' => Category::where('name', 'التصميم')->first()->id,
            'publisher_id' => Publisher::where('name', 'أكاديمية حسوب')->first()->id,
            'title' => 'مدخل إلى تجربة المستخدم',
            'description' => 'يضع هذا الكتاب المُوجز القارئ على أعتاب عالم تصميم تجربة المُستخدمين UX، وهو علم له قواعده وأصوله وأدواته، ويهدف إلى تعريف القارئ المُبتدئ بأساس هذا العلم وكيف يُطبّق على المُنتجات الرّقمية من مواقع ويب خدميّة وتطبيقات على الأجهزة الذّكية وصولًا إلى التّصميم الأمثل الّذي يُوفِّق بين هدف المُستخدم أوّلًا وهدف الخدمة التّجاريّ، الأمر الّذي يعني منتجًا ناجحًا. ',
            'number_of_copies' => '300',
            'number_of_pages' => '288',
            'price' => '22',
            'isbn'=>'100000000001',
            'cover_image' => 'images/covers/2.png',
        ]);
        $book2->authors()->attach(Author::where('name', 'محمد عرابي')->first());
        
        $book3 = Book::create([
            'category_id' => Category::where('name', 'العمل الحر')->first()->id,
            'publisher_id' => Publisher::where('name', 'أكاديمية حسوب')->first()->id,
            'title' => 'دليلك المختصر لبيع المنتجات الرقمية',
            'description' => 'هل لديك وظيفة ولكن طموحك يمنعك من الاعتماد على الوظيفة فقط وأردت أن تبدأ عملك الحر لتحقق المزيد من الدخل والاستقلالية، فأنا ادعوك لقراءة هذا الدليل المختصر بتمعن لتتعرف على المنتجات الرقمية وكيف يمكنك البدء ببيعها، والمفاجأة السارة أنه يمكنك أن تبدأ بالعمل من دون رأس مال في كثير من الأحيان، فكل ما تحتاج إليه لتتمكن من البدء جهاز كمبيوتر وخط اتصال بالإنترنت بالإضافة إلى العمل الجاد والرغبة بالنجاح.
            إذا كنت لا تؤمن بهذا النوع من الأعمال وتعتقد أنها غير مجدية، فأنا أدعوك لأن لا تتعجل، فسأطلعك على قصص نجاح ستغير دون شك من هذا الاعتقاد ولكن بعد أن نستعرض بشكل مختصر بعد المحطات الرئيسية لتطور العملية التجارية في شبكة الإنترنت، بالإضافة إلى لمحة عن وضع الشراء الإلكتروني في العالم العربي.
            أنصحك بالابتعاد عن مصادر الإزعاج وإعداد كوب من القهوة لتبدأ عملك بكل نشاط وتركيز وتكون قادرا على البدء في بناء مستقبلك',
            'number_of_copies' => '300',
            'number_of_pages' => '288',
            'price' => '18',
            'isbn'=>'100000000002',
            'cover_image' => 'images/covers/3.png',
        ]);
        $book3->authors()->attach(Author::where('name', 'محمد الزاير')->first());
        
        $book4 = Book::create([
            'category_id' => Category::where('name', 'العمل الحر')->first()->id,
            'publisher_id' => Publisher::where('name', 'أكاديمية حسوب')->first()->id,
            'title' => 'دليلك المختصر لبدء العمل عبر الإنترنت',
            'description' => '

            تحية إلى كل الأحرار … لا، هذه ليست دعوة ثورية ضد نظام الحكم للأسف كما قد يخطر ببالك، ولكنها دعوة إلى الثورة على نمط الحياة الممل الذي يحياه معظمنا.
            
            دعوة إلى الحياة بحرية أكبر خارج دائرة مثل "لقمة العيش" و "الحمار المربوط في الساقية" و "عبد المأمور" و "اربط الحمار في المكان الذي يريده صاحبه"، مثل هذه المفاهيم وأكثر كانت -وما زالت- سبب في تأخر أمة بأكملها.
            
            أوصاني أستاذي باستذكار دروسي جيداً حتى أحصل على شهادة جامعية تؤهلني لوظيفة محترمة، مسكين أستاذي، تُرى ماذا سيقول إذا علم أن أشخاص مثل "ستيف جوبز" و "مارك زوكربيرج" و "بيل جيتس" لم يكملوا تعليمهم.
            
            هذه المفاهيم يجب أن تتحطم، وأكثر مفهوم سيسعى هذا الكتاب إلى تحطيمه هو أنه يجب عليك أن تذهب إلى العمل كل يوم.
            
            في هذا الكفاية، افتح الباب الآن، وانظر إلى ما سيفاجئك به عالم اليوم.
            ',
            'number_of_copies' => '300',
            'number_of_pages' => '288',
            'price' => '12',
            'isbn'=>'100000000003',
            'cover_image' => 'images/covers/4.png',
        ]);
        $book4->authors()->attach(Author::where('name', 'عمر النواوي')->first());
        
        $book5 = Book::create([
            'category_id' => Category::where('name', 'التسويق والمبيعات')->first()->id,
            'publisher_id' => Publisher::where('name', 'أكاديمية حسوب')->first()->id,
            'title' => 'الدليل المختصر لصفحات الهبوط',
            'description' => '

            صفحات الهبوط أو Landing Pages أصبحت الآن من الثوابت في عالم التسويق الإلكتروني لكل من يرغب في بناء قائمة بريدية ثرية من العملاء المستهدفين، الذين يمثلون أعلى عائد على الاستثمار ROI (اختصارًا لـ Return On Investment) إذا تم استغلالها بالشكل الصحيح.
            ولكن ما هي صفحات الهبوط؟ وإلى أي مدى يمكن تحقيق استفادة استثنائية منها في مشروعك أو شركتك؟
            
            في هذا الدليل المختصر نستعرض ماهية صفحات الهبوط، أهميتها، كيفية صناعتها، وما هي أفضل الممارسات التي تحقق بها أعلى استفادة من استخدامها.
            ',
            'number_of_copies' => '300',
            'number_of_pages' => '288',
            'price' => '24',
            'isbn'=>'100000000004',
            'cover_image' => 'images/covers/5.png',
        ]);
        $book5->authors()->attach(Author::where('name', 'ماجد عطوي')->first());
        
        $book6 = Book::create([
            'category_id' => Category::where('name', 'التسويق والمبيعات')->first()->id,
            'publisher_id' => Publisher::where('name', 'أكاديمية حسوب')->first()->id,
            'title' => 'دليلك المختصر للعمل كمسوق بالعمولة',
            'description' => 'مرّت علي حتى كتابة هذه السّطور (1/2015) 3 سنوات تماما في العمل المُستقل من البيت، جرّبت خلال هذه الفترة العديد من الأفكار والمشاريع التي أخفق كثيرٌ منها ونجح بعضها نجاحًا نسبيا، فيما لا أزال رغم تحديّات العمل من البيت  أشعر بمُتعة الاستقلالية واتخاذ القرارات والتألق أكثر في عالم الأعمال أون لاين الذي يُعلّمني الكثير كل يوم.
 
            كنت ولا زلت أستخدم مهاراتي الفنية لطلب الرّزق من العمل المُستقل عبر الإنترنت كعمل أساسي أعتمد عليه، تطلّب مني هذا العمل أن أطوّر نفسي بشكل مُستمر وسريع، وأن أقرأ بنَهَم كل ما تقع عليه عيني من مقالات علمية في مجال التسويق والمبيعات. فبالإضافة إلى تقديمي خدمات مُتخصّصة كالتصميم والكتابة التسويقية وخدمات التسويق الإلكتروني لعُملائي، صمّمت -بالاعتماد على عدد من المُستقلين الآخرين- مُنتجات رقمية عربية وأجنبية حقّقتُ من خلالها مبالغ جيّدة حقّقت لي شُعورًا لم أجده في بيع الخدمات.',
            'number_of_copies' => '300',
            'number_of_pages' => '288',
            'price' => '20',
            'isbn'=>'100000000005',
            'cover_image' => 'images/covers/6.png',
        ]);
        $book6->authors()->attach(Author::where('name', 'رياض سامر')->first());
    }
}
