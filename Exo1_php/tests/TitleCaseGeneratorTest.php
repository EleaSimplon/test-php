<?php
	use App\TitleCaseGenerator;
    use PHPUnit\Framework\TestCase;

    class TitleCaseGeneratorTest extends TestCase
    {

        function test_makeTitleCase_oneWord()
        {

            $title_generator = new TitleCaseGenerator;
            $title = $title_generator->makeTitleCase('simplon');
            $title2 = $title_generator->makeTitleCase('sim plon');
            $title3 = $title_generator->makeTitleCase('sim and plon');
            $this->assertSame($title, 'Simplon');
            $this->assertSame($title2, 'Sim Plon');
            $this->assertSame($title3, 'Sim and Plon');

        }

        function test_makeTitleCase_multipleWords()
        {

            $title_generator = new TitleCaseGenerator;
            $title = $title_generator->makeTitleCase('sim plon');
            $title2 = $title_generator->makeTitleCase('sim and plon');

            $this->assertSame(substr_count($title, ' '), 1);
            $this->assertSame(substr_count($title2, ' '), 2);
        }

        function test_makeTitleCase_lowercasePrep()
        {

            $title_generator = new TitleCaseGenerator;
            $title = $title_generator->makeTitleCase('SIMPLON');
            $this->assertSame($title, 'Simplon');

        }

        function test_makeTitleCase_upperToLower()
        {

            $title_generator = new TitleCaseGenerator;
            $title = $title_generator->makeTitleCase('SIMPLON');
            $this->assertSame($title, 'Simplon');
        }

        function test_makeTitleCase_nonNumeric()
        {

            $title_generator = new TitleCaseGenerator;
            $title = $title_generator->makeTitleCase('sim plon');
            $title2 = $title_generator->makeTitleCase('sim and plon');

            $this->assertSame(gettype($title), 'string');
            $this->assertSame(gettype($title2), 'string');
        }

        function test_makeTitleCase_mixedCase()
        {
        }
    }

?>