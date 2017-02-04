<?php
namespace stackexchange\codereview;

class HowTo154265Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider _dataProvider
     */
    public function test($error_file, $error_dir, $error_img, $error_mp, $expectedStatus, $expectedMessage)
    {
        $status = "OK";
        $message = "";
        $result = array_filter([$error_file, $error_dir, $error_img, $error_mp]);

        if ($result) {
            $status = "KO";
            $message = implode('|', $result);
        }

        $this->assertSame($status, $expectedStatus);
        $this->assertSame($message, $expectedMessage);
    }

    /**
     * @return array
     */
    public function _dataProvider()
    {
        return [
            'Everything is ok' => [
                'error_file' => '',
                'error_dir' => '',
                'error_img' => '',
                'error_mp' => '',

                'expectedStatus' => 'OK',
                'expectedMessage' => '',
            ],
            'One error occured' => [
                'error_file' => '',
                'error_dir' => 'Error',
                'error_img' => '',
                'error_mp' => '',

                'expectedStatus' => 'KO',
                'expectedMessage' => 'Error',
            ],
            'Two errors occured' => [
                'error_file' => '',
                'error_dir' => 'Error dir',
                'error_img' => '',
                'error_mp' => 'Error mp',

                'expectedStatus' => 'KO',
                'expectedMessage' => 'Error dir|Error mp',
            ],
        ];
    }
}
