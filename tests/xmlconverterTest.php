<?php

use App\converter\xmlimport as xmlimport;

class xmlconverterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $xmlvalue= file_get_contents(storage_path('tests/xmltest.xml'));
        $xmlimp = new xmlimport();
        $ret = $xmlimp->parse($xmlvalue);

        $this->assertTrue($ret,'$xmlimp->parse failed');

        $tracks = $xmlimp->gettracks();
        $headercells = $xmlimp->getkeys();
        $this->assertEquals($xmlimp->data['Major Version'],1);
        $this->assertEquals($xmlimp->data['Minor Version'],1);
        $this->assertEquals($xmlimp->data['Library Persistent ID'],'CCDAAA2CE6F81919');

        $this->assertEquals(count($headercells),33);
        $this->assertEquals($headercells['Library Folder Count'],'Library Folder Count');

        $this->assertEquals(count($tracks),2);
        $this->assertEquals($tracks[1819]['Sort Artist'],'Nicold Frias');
        $this->assertEquals($tracks[1819]['Sort Name'],'Fuiste Tu');
    }
}
