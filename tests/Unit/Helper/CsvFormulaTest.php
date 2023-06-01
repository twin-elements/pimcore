<?php

declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PCL
 */


use Pimcore\Helper\CsvFormulaFormatter;
use Pimcore\Tests\Test\TestCase;

class CsvFormulaTest extends TestCase
{
    public function testUnEscapeFormula()
    {
        $formatter = new CsvFormulaFormatter("'", ['=', '-', '+', '@']);

        $this->assertEquals("=1+1", $formatter->unEscapeField("'=1+1"));
        $this->assertEquals("-1+1", $formatter->unEscapeField("'-1+1"));
        $this->assertEquals("+1+1", $formatter->unEscapeField("'+1+1"));
        $this->assertEquals("@1+1", $formatter->unEscapeField("'@1+1"));

        // There should be no escape. So the string should be returned as is.
        $this->assertEquals("test", $formatter->unEscapeField("test"));
    }
}
