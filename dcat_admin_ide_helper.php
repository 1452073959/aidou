<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection alias
     * @property Grid\Column|Collection authors
     * @property Grid\Column|Collection enable
     * @property Grid\Column|Collection imported
     * @property Grid\Column|Collection config
     * @property Grid\Column|Collection require
     * @property Grid\Column|Collection require_dev
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection path
     * @property Grid\Column|Collection method
     * @property Grid\Column|Collection ip
     * @property Grid\Column|Collection input
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection star
     * @property Grid\Column|Collection xid
     * @property Grid\Column|Collection endtime
     * @property Grid\Column|Collection img
     * @property Grid\Column|Collection stocksnum
     * @property Grid\Column|Collection tel
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection url
     * @property Grid\Column|Collection boxnum
     * @property Grid\Column|Collection max
     * @property Grid\Column|Collection min
     * @property Grid\Column|Collection backimage
     * @property Grid\Column|Collection influencenum
     * @property Grid\Column|Collection speed_id
     * @property Grid\Column|Collection last_time
     * @property Grid\Column|Collection collect
     * @property Grid\Column|Collection total
     * @property Grid\Column|Collection frameid
     * @property Grid\Column|Collection userid
     * @property Grid\Column|Collection amcode
     * @property Grid\Column|Collection fine
     * @property Grid\Column|Collection brand
     * @property Grid\Column|Collection place
     * @property Grid\Column|Collection category
     * @property Grid\Column|Collection norms
     * @property Grid\Column|Collection units
     * @property Grid\Column|Collection phr
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection remarks
     * @property Grid\Column|Collection coefficient
     * @property Grid\Column|Collection important
     * @property Grid\Column|Collection in_price
     * @property Grid\Column|Collection time
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection sum
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection num
     * @property Grid\Column|Collection qunmass_id
     * @property Grid\Column|Collection celebrity_id
     * @property Grid\Column|Collection end_time
     * @property Grid\Column|Collection del_time
     * @property Grid\Column|Collection y
     * @property Grid\Column|Collection m
     * @property Grid\Column|Collection d
     * @property Grid\Column|Collection w
     * @property Grid\Column|Collection mingci
     * @property Grid\Column|Collection grade
     * @property Grid\Column|Collection upgrade
     * @property Grid\Column|Collection award
     * @property Grid\Column|Collection what
     * @property Grid\Column|Collection linit
     * @property Grid\Column|Collection newlimit
     * @property Grid\Column|Collection nickname
     * @property Grid\Column|Collection weapp_avatar
     * @property Grid\Column|Collection weapp_openid
     * @property Grid\Column|Collection defaultaddress_id
     * @property Grid\Column|Collection diamondnum
     * @property Grid\Column|Collection votenum
     * @property Grid\Column|Collection box
     * @property Grid\Column|Collection drawamount
     * @property Grid\Column|Collection task_id
     *
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection alias(string $label = null)
     * @method Grid\Column|Collection authors(string $label = null)
     * @method Grid\Column|Collection enable(string $label = null)
     * @method Grid\Column|Collection imported(string $label = null)
     * @method Grid\Column|Collection config(string $label = null)
     * @method Grid\Column|Collection require(string $label = null)
     * @method Grid\Column|Collection require_dev(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection path(string $label = null)
     * @method Grid\Column|Collection method(string $label = null)
     * @method Grid\Column|Collection ip(string $label = null)
     * @method Grid\Column|Collection input(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection star(string $label = null)
     * @method Grid\Column|Collection xid(string $label = null)
     * @method Grid\Column|Collection endtime(string $label = null)
     * @method Grid\Column|Collection img(string $label = null)
     * @method Grid\Column|Collection stocksnum(string $label = null)
     * @method Grid\Column|Collection tel(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection url(string $label = null)
     * @method Grid\Column|Collection boxnum(string $label = null)
     * @method Grid\Column|Collection max(string $label = null)
     * @method Grid\Column|Collection min(string $label = null)
     * @method Grid\Column|Collection backimage(string $label = null)
     * @method Grid\Column|Collection influencenum(string $label = null)
     * @method Grid\Column|Collection speed_id(string $label = null)
     * @method Grid\Column|Collection last_time(string $label = null)
     * @method Grid\Column|Collection collect(string $label = null)
     * @method Grid\Column|Collection total(string $label = null)
     * @method Grid\Column|Collection frameid(string $label = null)
     * @method Grid\Column|Collection userid(string $label = null)
     * @method Grid\Column|Collection amcode(string $label = null)
     * @method Grid\Column|Collection fine(string $label = null)
     * @method Grid\Column|Collection brand(string $label = null)
     * @method Grid\Column|Collection place(string $label = null)
     * @method Grid\Column|Collection category(string $label = null)
     * @method Grid\Column|Collection norms(string $label = null)
     * @method Grid\Column|Collection units(string $label = null)
     * @method Grid\Column|Collection phr(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection remarks(string $label = null)
     * @method Grid\Column|Collection coefficient(string $label = null)
     * @method Grid\Column|Collection important(string $label = null)
     * @method Grid\Column|Collection in_price(string $label = null)
     * @method Grid\Column|Collection time(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection sum(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection num(string $label = null)
     * @method Grid\Column|Collection qunmass_id(string $label = null)
     * @method Grid\Column|Collection celebrity_id(string $label = null)
     * @method Grid\Column|Collection end_time(string $label = null)
     * @method Grid\Column|Collection del_time(string $label = null)
     * @method Grid\Column|Collection y(string $label = null)
     * @method Grid\Column|Collection m(string $label = null)
     * @method Grid\Column|Collection d(string $label = null)
     * @method Grid\Column|Collection w(string $label = null)
     * @method Grid\Column|Collection mingci(string $label = null)
     * @method Grid\Column|Collection grade(string $label = null)
     * @method Grid\Column|Collection upgrade(string $label = null)
     * @method Grid\Column|Collection award(string $label = null)
     * @method Grid\Column|Collection what(string $label = null)
     * @method Grid\Column|Collection linit(string $label = null)
     * @method Grid\Column|Collection newlimit(string $label = null)
     * @method Grid\Column|Collection nickname(string $label = null)
     * @method Grid\Column|Collection weapp_avatar(string $label = null)
     * @method Grid\Column|Collection weapp_openid(string $label = null)
     * @method Grid\Column|Collection defaultaddress_id(string $label = null)
     * @method Grid\Column|Collection diamondnum(string $label = null)
     * @method Grid\Column|Collection votenum(string $label = null)
     * @method Grid\Column|Collection box(string $label = null)
     * @method Grid\Column|Collection drawamount(string $label = null)
     * @method Grid\Column|Collection task_id(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection name
     * @property Show\Field|Collection version
     * @property Show\Field|Collection alias
     * @property Show\Field|Collection authors
     * @property Show\Field|Collection enable
     * @property Show\Field|Collection imported
     * @property Show\Field|Collection config
     * @property Show\Field|Collection require
     * @property Show\Field|Collection require_dev
     * @property Show\Field|Collection id
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection path
     * @property Show\Field|Collection method
     * @property Show\Field|Collection ip
     * @property Show\Field|Collection input
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection star
     * @property Show\Field|Collection xid
     * @property Show\Field|Collection endtime
     * @property Show\Field|Collection img
     * @property Show\Field|Collection stocksnum
     * @property Show\Field|Collection tel
     * @property Show\Field|Collection status
     * @property Show\Field|Collection url
     * @property Show\Field|Collection boxnum
     * @property Show\Field|Collection max
     * @property Show\Field|Collection min
     * @property Show\Field|Collection backimage
     * @property Show\Field|Collection influencenum
     * @property Show\Field|Collection speed_id
     * @property Show\Field|Collection last_time
     * @property Show\Field|Collection collect
     * @property Show\Field|Collection total
     * @property Show\Field|Collection frameid
     * @property Show\Field|Collection userid
     * @property Show\Field|Collection amcode
     * @property Show\Field|Collection fine
     * @property Show\Field|Collection brand
     * @property Show\Field|Collection place
     * @property Show\Field|Collection category
     * @property Show\Field|Collection norms
     * @property Show\Field|Collection units
     * @property Show\Field|Collection phr
     * @property Show\Field|Collection price
     * @property Show\Field|Collection remarks
     * @property Show\Field|Collection coefficient
     * @property Show\Field|Collection important
     * @property Show\Field|Collection in_price
     * @property Show\Field|Collection time
     * @property Show\Field|Collection type
     * @property Show\Field|Collection sum
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection num
     * @property Show\Field|Collection qunmass_id
     * @property Show\Field|Collection celebrity_id
     * @property Show\Field|Collection end_time
     * @property Show\Field|Collection del_time
     * @property Show\Field|Collection y
     * @property Show\Field|Collection m
     * @property Show\Field|Collection d
     * @property Show\Field|Collection w
     * @property Show\Field|Collection mingci
     * @property Show\Field|Collection grade
     * @property Show\Field|Collection upgrade
     * @property Show\Field|Collection award
     * @property Show\Field|Collection what
     * @property Show\Field|Collection linit
     * @property Show\Field|Collection newlimit
     * @property Show\Field|Collection nickname
     * @property Show\Field|Collection weapp_avatar
     * @property Show\Field|Collection weapp_openid
     * @property Show\Field|Collection defaultaddress_id
     * @property Show\Field|Collection diamondnum
     * @property Show\Field|Collection votenum
     * @property Show\Field|Collection box
     * @property Show\Field|Collection drawamount
     * @property Show\Field|Collection task_id
     *
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection alias(string $label = null)
     * @method Show\Field|Collection authors(string $label = null)
     * @method Show\Field|Collection enable(string $label = null)
     * @method Show\Field|Collection imported(string $label = null)
     * @method Show\Field|Collection config(string $label = null)
     * @method Show\Field|Collection require(string $label = null)
     * @method Show\Field|Collection require_dev(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection path(string $label = null)
     * @method Show\Field|Collection method(string $label = null)
     * @method Show\Field|Collection ip(string $label = null)
     * @method Show\Field|Collection input(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection star(string $label = null)
     * @method Show\Field|Collection xid(string $label = null)
     * @method Show\Field|Collection endtime(string $label = null)
     * @method Show\Field|Collection img(string $label = null)
     * @method Show\Field|Collection stocksnum(string $label = null)
     * @method Show\Field|Collection tel(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection url(string $label = null)
     * @method Show\Field|Collection boxnum(string $label = null)
     * @method Show\Field|Collection max(string $label = null)
     * @method Show\Field|Collection min(string $label = null)
     * @method Show\Field|Collection backimage(string $label = null)
     * @method Show\Field|Collection influencenum(string $label = null)
     * @method Show\Field|Collection speed_id(string $label = null)
     * @method Show\Field|Collection last_time(string $label = null)
     * @method Show\Field|Collection collect(string $label = null)
     * @method Show\Field|Collection total(string $label = null)
     * @method Show\Field|Collection frameid(string $label = null)
     * @method Show\Field|Collection userid(string $label = null)
     * @method Show\Field|Collection amcode(string $label = null)
     * @method Show\Field|Collection fine(string $label = null)
     * @method Show\Field|Collection brand(string $label = null)
     * @method Show\Field|Collection place(string $label = null)
     * @method Show\Field|Collection category(string $label = null)
     * @method Show\Field|Collection norms(string $label = null)
     * @method Show\Field|Collection units(string $label = null)
     * @method Show\Field|Collection phr(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection remarks(string $label = null)
     * @method Show\Field|Collection coefficient(string $label = null)
     * @method Show\Field|Collection important(string $label = null)
     * @method Show\Field|Collection in_price(string $label = null)
     * @method Show\Field|Collection time(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection sum(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection num(string $label = null)
     * @method Show\Field|Collection qunmass_id(string $label = null)
     * @method Show\Field|Collection celebrity_id(string $label = null)
     * @method Show\Field|Collection end_time(string $label = null)
     * @method Show\Field|Collection del_time(string $label = null)
     * @method Show\Field|Collection y(string $label = null)
     * @method Show\Field|Collection m(string $label = null)
     * @method Show\Field|Collection d(string $label = null)
     * @method Show\Field|Collection w(string $label = null)
     * @method Show\Field|Collection mingci(string $label = null)
     * @method Show\Field|Collection grade(string $label = null)
     * @method Show\Field|Collection upgrade(string $label = null)
     * @method Show\Field|Collection award(string $label = null)
     * @method Show\Field|Collection what(string $label = null)
     * @method Show\Field|Collection linit(string $label = null)
     * @method Show\Field|Collection newlimit(string $label = null)
     * @method Show\Field|Collection nickname(string $label = null)
     * @method Show\Field|Collection weapp_avatar(string $label = null)
     * @method Show\Field|Collection weapp_openid(string $label = null)
     * @method Show\Field|Collection defaultaddress_id(string $label = null)
     * @method Show\Field|Collection diamondnum(string $label = null)
     * @method Show\Field|Collection votenum(string $label = null)
     * @method Show\Field|Collection box(string $label = null)
     * @method Show\Field|Collection drawamount(string $label = null)
     * @method Show\Field|Collection task_id(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
