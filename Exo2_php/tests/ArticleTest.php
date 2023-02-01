<?php
	
use PHPUnit\Framework\TestCase; 
use App\Article;

class ArticleTest extends TestCase {

	protected $article;

	public function testTitleIsEmptyByDefault() {
        $article = new Article;
        $title = $article->title;
        $this->assertEmpty($title);
    }

    public function testSlugIsEmtpyWithNoTitle() {
        $article = new Article;
        $article->getSlug();
        $title = $article->title;
        $this->assertEmpty($title);
    }

    public function provider() {
    	return array(
    		"testSlugHasSpacesReplacedByUnderscores" => array("An example article", "An_example_article"),
    		"testSlugHasWhitespaceReplaceBySingleUnderscore" => array("An     example  \n   article", "An_example_article"),
    		"testSlugdoesNotStartOrEndWithAnUnderscore" => array(" An example article ", "An_example_article"),
    		"testSlugDoesNotHaveAnyNonWordCharacters" => array("Read! This! Now!", "Read_This_Now"),
    	);
    }

    /**
     * @dataProvider provider
     */
    public function testSlug($title, $slug) {
        $article = new Article;
        $article->title = 'je suis un titre';
        $slug = $article->getSlug();
        $this->assertSame('je_suis_un_titre', $slug);
    }
}
	
?>