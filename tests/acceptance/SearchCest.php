<?php

class SearchCest
{
    public function Search(AcceptanceTester $I)
    {
        $I->amOnUrl('https://www.google.com');
        eval(\Psy\sh());
    }
}
