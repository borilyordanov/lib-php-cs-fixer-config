<?php

namespace Paysera\PhpCsFixerConfig\Tests\Fixer\PhpBasic\Feature;

use PhpCsFixer\Test\AbstractFixerTestCase;

final class FunctionCountFixerTest extends AbstractFixerTestCase
{
    /**
     * @param string $expected
     * @param null|string $input
     *
     * @dataProvider provideCases
     */
    public function testFix($expected, $input = null)
    {
        $this->doTest($expected, $input);
    }

    public function provideCases()
    {
        return [
            [
                '<?php return count([1, 2, 3, 4, 5]);',
                '<?php return sizeof([1, 2, 3, 4, 5]);',
            ],
            [
                '<?php $a = []; return count($a);',
                '<?php $a = []; return sizeof($a);',
            ],
            [
                '<?php count([]); count([]);',
                '<?php sizeof([]); count([]);',
            ],
        ];
    }

    public function getFixerName()
    {
        return 'no_alias_functions';
    }
}
