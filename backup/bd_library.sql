PGDMP     (    3                w         
   bd_library "   10.10 (Ubuntu 10.10-1.pgdg18.04+1)     11.5 (Ubuntu 11.5-1.pgdg18.04+1) 0    ?           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            ?           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            ?           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            ?           1262    31278 
   bd_library    DATABASE     |   CREATE DATABASE bd_library WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'es_ES.UTF-8' LC_CTYPE = 'es_ES.UTF-8';
    DROP DATABASE bd_library;
             postgres    false            ?            1259    31281    author    TABLE        CREATE TABLE public.author (
    idauthor integer DEFAULT nextval(('Author_idauthor_seq'::text)::regclass) NOT NULL,
    name character varying(50) NOT NULL,
    nacionality character varying(50) NOT NULL,
    date_birth date NOT NULL,
    state bit(1)
);
    DROP TABLE public.author;
       public         postgres    false            ?            1259    31279    author_idauthor_seq    SEQUENCE     |   CREATE SEQUENCE public.author_idauthor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.author_idauthor_seq;
       public       postgres    false            ?            1259    31287    book    TABLE     S  CREATE TABLE public.book (
    idbook integer DEFAULT nextval(('Book_idbook_seq'::text)::regclass) NOT NULL,
    title character varying(100) NOT NULL,
    stock integer NOT NULL,
    likes integer,
    image character varying(200),
    year integer,
    fkidcategory integer NOT NULL,
    fkidauthor integer NOT NULL,
    state bit(1)
);
    DROP TABLE public.book;
       public         postgres    false            ?            1259    31285    book_idbook_seq    SEQUENCE     x   CREATE SEQUENCE public.book_idbook_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.book_idbook_seq;
       public       postgres    false            ?            1259    31293    category    TABLE     ?   CREATE TABLE public.category (
    idcategory integer DEFAULT nextval(('Category_idcategory_seq'::text)::regclass) NOT NULL,
    name character varying(50) NOT NULL,
    state bit(1)
);
    DROP TABLE public.category;
       public         postgres    false            ?            1259    31291    category_idcategory_seq    SEQUENCE     ?   CREATE SEQUENCE public.category_idcategory_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.category_idcategory_seq;
       public       postgres    false            ?            1259    31297    comment_idcomment_seq    SEQUENCE     ~   CREATE SEQUENCE public.comment_idcomment_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.comment_idcomment_seq;
       public       postgres    false            ?            1259    31299    comments    TABLE     9  CREATE TABLE public.comments (
    idcomments integer DEFAULT nextval(('Comment_idcomment_seq'::text)::regclass) NOT NULL,
    comment character varying(255) NOT NULL,
    fkidusers integer NOT NULL,
    fkidpublication integer NOT NULL,
    date_comment timestamp(4) with time zone NOT NULL,
    state bit(1)
);
    DROP TABLE public.comments;
       public         postgres    false            ?            1259    31305    publication    TABLE     H  CREATE TABLE public.publication (
    idpublication integer DEFAULT nextval(('Publication_idpublication_seq'::text)::regclass) NOT NULL,
    description character varying(200) NOT NULL,
    date_publication timestamp(4) with time zone NOT NULL,
    fkidusers integer NOT NULL,
    fkidbook integer NOT NULL,
    state bit(1)
);
    DROP TABLE public.publication;
       public         postgres    false            ?            1259    31303    publication_idpublication_seq    SEQUENCE     ?   CREATE SEQUENCE public.publication_idpublication_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.publication_idpublication_seq;
       public       postgres    false            ?            1259    31311    reserve    TABLE     .  CREATE TABLE public.reserve (
    idreserve integer DEFAULT nextval(('Reserve_idreserve_seq'::text)::regclass) NOT NULL,
    date_reserve date NOT NULL,
    fkidbook integer NOT NULL,
    fkidusers integer NOT NULL,
    state_reserve bit(1),
    state bit(1),
    description character varying(100)
);
    DROP TABLE public.reserve;
       public         postgres    false            ?            1259    31309    reserve_idreserve_seq    SEQUENCE     ~   CREATE SEQUENCE public.reserve_idreserve_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.reserve_idreserve_seq;
       public       postgres    false            ?            1259    31317    users    TABLE     ?  CREATE TABLE public.users (
    idusers integer DEFAULT nextval(('Users_idusers_seq'::text)::regclass) NOT NULL,
    code integer NOT NULL,
    name character varying(50) NOT NULL,
    last_name character varying(50) NOT NULL,
    email character varying(50) NOT NULL,
    user_name character varying(50) NOT NULL,
    password character varying(255) NOT NULL,
    user_type character(1) NOT NULL,
    state bit(1) NOT NULL,
    active bit(1) NOT NULL
);
    DROP TABLE public.users;
       public         postgres    false            ?            1259    31315    users_idusers_seq    SEQUENCE     z   CREATE SEQUENCE public.users_idusers_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.users_idusers_seq;
       public       postgres    false            ?          0    31281    author 
   TABLE DATA               P   COPY public.author (idauthor, name, nacionality, date_birth, state) FROM stdin;
    public       postgres    false    197   ?9       ?          0    31287    book 
   TABLE DATA               i   COPY public.book (idbook, title, stock, likes, image, year, fkidcategory, fkidauthor, state) FROM stdin;
    public       postgres    false    199   ?9       ?          0    31293    category 
   TABLE DATA               ;   COPY public.category (idcategory, name, state) FROM stdin;
    public       postgres    false    201   [:       ?          0    31299    comments 
   TABLE DATA               h   COPY public.comments (idcomments, comment, fkidusers, fkidpublication, date_comment, state) FROM stdin;
    public       postgres    false    203   ?:       ?          0    31305    publication 
   TABLE DATA               o   COPY public.publication (idpublication, description, date_publication, fkidusers, fkidbook, state) FROM stdin;
    public       postgres    false    205   .;       ?          0    31311    reserve 
   TABLE DATA               r   COPY public.reserve (idreserve, date_reserve, fkidbook, fkidusers, state_reserve, state, description) FROM stdin;
    public       postgres    false    207   ?;       ?          0    31317    users 
   TABLE DATA               u   COPY public.users (idusers, code, name, last_name, email, user_name, password, user_type, state, active) FROM stdin;
    public       postgres    false    209   .<       ?           0    0    author_idauthor_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.author_idauthor_seq', 1, true);
            public       postgres    false    196            ?           0    0    book_idbook_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.book_idbook_seq', 2, true);
            public       postgres    false    198            ?           0    0    category_idcategory_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.category_idcategory_seq', 5, true);
            public       postgres    false    200            ?           0    0    comment_idcomment_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.comment_idcomment_seq', 2, true);
            public       postgres    false    202            ?           0    0    publication_idpublication_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.publication_idpublication_seq', 3, true);
            public       postgres    false    204            ?           0    0    reserve_idreserve_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.reserve_idreserve_seq', 2, true);
            public       postgres    false    206            ?           0    0    users_idusers_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.users_idusers_seq', 4, true);
            public       postgres    false    208            6           2606    31322    author pk_author 
   CONSTRAINT     T   ALTER TABLE ONLY public.author
    ADD CONSTRAINT pk_author PRIMARY KEY (idauthor);
 :   ALTER TABLE ONLY public.author DROP CONSTRAINT pk_author;
       public         postgres    false    197            8           2606    31324    book pk_book 
   CONSTRAINT     N   ALTER TABLE ONLY public.book
    ADD CONSTRAINT pk_book PRIMARY KEY (idbook);
 6   ALTER TABLE ONLY public.book DROP CONSTRAINT pk_book;
       public         postgres    false    199            :           2606    31326    category pk_category 
   CONSTRAINT     Z   ALTER TABLE ONLY public.category
    ADD CONSTRAINT pk_category PRIMARY KEY (idcategory);
 >   ALTER TABLE ONLY public.category DROP CONSTRAINT pk_category;
       public         postgres    false    201            <           2606    31328    comments pk_comments 
   CONSTRAINT     Z   ALTER TABLE ONLY public.comments
    ADD CONSTRAINT pk_comments PRIMARY KEY (idcomments);
 >   ALTER TABLE ONLY public.comments DROP CONSTRAINT pk_comments;
       public         postgres    false    203            B           2606    31334    users pk_persona 
   CONSTRAINT     S   ALTER TABLE ONLY public.users
    ADD CONSTRAINT pk_persona PRIMARY KEY (idusers);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT pk_persona;
       public         postgres    false    209            >           2606    31330    publication pk_publication 
   CONSTRAINT     c   ALTER TABLE ONLY public.publication
    ADD CONSTRAINT pk_publication PRIMARY KEY (idpublication);
 D   ALTER TABLE ONLY public.publication DROP CONSTRAINT pk_publication;
       public         postgres    false    205            @           2606    31332    reserve pk_reserve 
   CONSTRAINT     W   ALTER TABLE ONLY public.reserve
    ADD CONSTRAINT pk_reserve PRIMARY KEY (idreserve);
 <   ALTER TABLE ONLY public.reserve DROP CONSTRAINT pk_reserve;
       public         postgres    false    207            D           2606    31336    users uq_usuario_code 
   CONSTRAINT     P   ALTER TABLE ONLY public.users
    ADD CONSTRAINT uq_usuario_code UNIQUE (code);
 ?   ALTER TABLE ONLY public.users DROP CONSTRAINT uq_usuario_code;
       public         postgres    false    209            E           2606    31337    book fk_book_author    FK CONSTRAINT     |   ALTER TABLE ONLY public.book
    ADD CONSTRAINT fk_book_author FOREIGN KEY (fkidauthor) REFERENCES public.author(idauthor);
 =   ALTER TABLE ONLY public.book DROP CONSTRAINT fk_book_author;
       public       postgres    false    199    2870    197            F           2606    31342    book fk_book_category    FK CONSTRAINT     ?   ALTER TABLE ONLY public.book
    ADD CONSTRAINT fk_book_category FOREIGN KEY (fkidcategory) REFERENCES public.category(idcategory);
 ?   ALTER TABLE ONLY public.book DROP CONSTRAINT fk_book_category;
       public       postgres    false    199    2874    201            G           2606    31347     comments fk_comments_publication    FK CONSTRAINT     ?   ALTER TABLE ONLY public.comments
    ADD CONSTRAINT fk_comments_publication FOREIGN KEY (fkidpublication) REFERENCES public.publication(idpublication);
 J   ALTER TABLE ONLY public.comments DROP CONSTRAINT fk_comments_publication;
       public       postgres    false    2878    203    205            H           2606    31352    comments fk_comments_users    FK CONSTRAINT     ?   ALTER TABLE ONLY public.comments
    ADD CONSTRAINT fk_comments_users FOREIGN KEY (fkidusers) REFERENCES public.users(idusers);
 D   ALTER TABLE ONLY public.comments DROP CONSTRAINT fk_comments_users;
       public       postgres    false    203    2882    209            I           2606    31357    publication fk_publication_book    FK CONSTRAINT     ?   ALTER TABLE ONLY public.publication
    ADD CONSTRAINT fk_publication_book FOREIGN KEY (fkidbook) REFERENCES public.book(idbook);
 I   ALTER TABLE ONLY public.publication DROP CONSTRAINT fk_publication_book;
       public       postgres    false    205    199    2872            J           2606    31362     publication fk_publication_users    FK CONSTRAINT     ?   ALTER TABLE ONLY public.publication
    ADD CONSTRAINT fk_publication_users FOREIGN KEY (fkidusers) REFERENCES public.users(idusers);
 J   ALTER TABLE ONLY public.publication DROP CONSTRAINT fk_publication_users;
       public       postgres    false    205    2882    209            K           2606    31367    reserve fk_reserve_book    FK CONSTRAINT     z   ALTER TABLE ONLY public.reserve
    ADD CONSTRAINT fk_reserve_book FOREIGN KEY (fkidbook) REFERENCES public.book(idbook);
 A   ALTER TABLE ONLY public.reserve DROP CONSTRAINT fk_reserve_book;
       public       postgres    false    2872    199    207            L           2606    31372    reserve fk_reserve_users    FK CONSTRAINT     ~   ALTER TABLE ONLY public.reserve
    ADD CONSTRAINT fk_reserve_users FOREIGN KEY (fkidusers) REFERENCES public.users(idusers);
 B   ALTER TABLE ONLY public.reserve DROP CONSTRAINT fk_reserve_users;
       public       postgres    false    207    2882    209            ?   3   x?3?tI??L?Q?M?KɯJ?t???,?L?4??4?54?52?4?????? 2      ?   ]   x?3?t?IOM*JTpJ?I?/?4?4?L??'????
?9??2???\F?.??E??
.?
?y?
nE?yٜF@??x|b^b|H]g? ?]?      ?   P   x?3?t???/?O?L?4?2??M,I?M,?LN,?4?2??ن\&???%?
??
?y?
.???E?ə?y@u?x?b???? I??      ?   c   x?m?=? @?N?`?bb`?.(?aP????????}????`ˇ?-??Abj!fEO??:?=?????H?w???3?/??e??ŗY???$^      ?   ?   x?]?A
?0?us??@efR?f??3????J?f??M???????]???f(b*:	,Z?????? ??]????Ǟ-?u??=?n?4h??(?N0?i??4P?!@??@??d?R	?;????g???"?O⋳ܤ?+s?c^)?>Q      ?   J   x?3?420??5??52?4?B???D??b??L??????"????Ԣ?D.#?KR???RR?2?2K2?:c???? ???      ?   ?   x?u?K
?0E?/??
J_?O;?P'R?8	?!?|J? Y??(A??{.n?u????9z??Ƙh??????XW\??? ?:??P2J??n8?M?=???N4S?C?(???t?u????#?&Xr?ϱ???Ӣi?F?b???e-?s?{<?D     