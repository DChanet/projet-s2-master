/*==============================================================*/
/* Nom de SGBD :  ORACLE Version 11g                            */
/* Date de création :  18/06/2019 09:41:54                      */
/*==============================================================*/


alter table CONSTRUIRE
   drop constraint FK_CONSTRUI_CONSTRUIR_LAUNCHPA;

alter table CONSTRUIRE
   drop constraint FK_CONSTRUI_CONSTRUIR_SON;

alter table NOTE
   drop constraint FK_NOTE_COMPOSER_SON;

alter table PARTIE
   drop constraint FK_PARTIE_CORRESPON_SON;

drop index CONSTRUIRE2_FK;

drop index CONSTRUIRE_FK;

drop table CONSTRUIRE cascade constraints;

drop table LAUNCHPAD cascade constraints;

drop index COMPOSER_FK;

drop table NOTE cascade constraints;

drop index CORRESPONDRE_FK;

drop table PARTIE cascade constraints;

drop table SON cascade constraints;

/*==============================================================*/
/* Table : CONSTRUIRE                                           */
/*==============================================================*/
create table CONSTRUIRE 
(
   ID                   INTEGER              not null,
   IDSON                INTEGER              not null,
   N_TOUCHE             INTEGER,
   constraint PK_CONSTRUIRE primary key (ID, IDSON)
);

/*==============================================================*/
/* Index : CONSTRUIRE_FK                                        */
/*==============================================================*/
create index CONSTRUIRE_FK on CONSTRUIRE (
   ID ASC
);

/*==============================================================*/
/* Index : CONSTRUIRE2_FK                                       */
/*==============================================================*/
create index CONSTRUIRE2_FK on CONSTRUIRE (
   IDSON ASC
);

/*==============================================================*/
/* Table : LAUNCHPAD                                            */
/*==============================================================*/
create table LAUNCHPAD 
(
   ID                   INTEGER              not null,
   NOM                  VARCHAR2(50),
   constraint PK_LAUNCHPAD primary key (ID)
);

/*==============================================================*/
/* Table : NOTE                                                 */
/*==============================================================*/
create table NOTE 
(
   IDNOTE               INTEGER              not null,
   IDSON                INTEGER,
   TEMPS                INTEGER,
   SCORE                INTEGER,
   constraint PK_NOTE primary key (IDNOTE)
);

/*==============================================================*/
/* Index : COMPOSER_FK                                          */
/*==============================================================*/
create index COMPOSER_FK on NOTE (
   IDSON ASC
);

/*==============================================================*/
/* Table : PARTIE                                               */
/*==============================================================*/
create table PARTIE 
(
   IDPARTIE             INTEGER              not null,
   IDSON                INTEGER,
   NOMJOUEUR            VARCHAR2(50),
   SCORE                INTEGER,
   constraint PK_PARTIE primary key (IDPARTIE)
);

/*==============================================================*/
/* Index : CORRESPONDRE_FK                                      */
/*==============================================================*/
create index CORRESPONDRE_FK on PARTIE (
   IDSON ASC
);

/*==============================================================*/
/* Table : SON                                                  */
/*==============================================================*/
create table SON 
(
   IDSON                INTEGER              not null,
   LIEN                 VARCHAR2(1024),
   NOM                  VARCHAR2(50),
   DUREE                INTEGER,
   constraint PK_SON primary key (IDSON)
);

alter table CONSTRUIRE
   add constraint FK_CONSTRUI_CONSTRUIR_LAUNCHPA foreign key (ID)
      references LAUNCHPAD (ID);

alter table CONSTRUIRE
   add constraint FK_CONSTRUI_CONSTRUIR_SON foreign key (IDSON)
      references SON (IDSON);

alter table NOTE
   add constraint FK_NOTE_COMPOSER_SON foreign key (IDSON)
      references SON (IDSON);

alter table PARTIE
   add constraint FK_PARTIE_CORRESPON_SON foreign key (IDSON)
      references SON (IDSON);
      
      
create or replace trigger enregistrer_Son
  before insert on Note
  for each row
  declare
  idN integer;
  begin
    if new.idSon in (select IDSON from Note ) then
      select idNote into idN from Note where idSon = new.idSon ;
      delete from Note where idNote is idN ;
      new.idNote = idN ; 
    end if
    if new.idNote is null or new.idNote in (select IDNOTE from Note ) then
      select max(IDNOTE) into idN From NOTE ;
      idN = idN + 1 ;
      new.idNote = idN ;
    end if;
end ;
/

create or replace trigger enregistrer_launchpad
  before insert on launchpad
  for each row
  declare
  idN integer;
  begin
    if new.id in (select ID from launchpad )  then
      delete from launchpad where id is new.id ; 
    end if;
    if new.id is null then
      select max(ID) into idN From launchpad ;
      idN = idN + 1 ;
      new.id = idN ;
    end if;
end ;

create or replace trigger enregistrer_Partie
  before insert on Partie
  for each row
  declare
  idN integer;
  bool boolean;
  begin
    if new.idPartie in (select IDPARTIE from PARTIE )  then
      delete from PARTIE where idPartie is new.idPartie and SCORE < new.SCORE and idSon = new.idSon;
      if new.idPartie not in (select IDPARTIE from PARTIE )
        bool = true ;
      end if;
    end if;
    if new.idSon in (select IDSon from PARTIE )  then
      select idPartie int idn from Partie where idSon is new.idSon and and SCORE < new.SCORE 
      delete from PARTIE where idSon is new.idSon and and SCORE < new.SCORE ; 
      new.idPartie = idN ;
      if new.idPartie not in (select IDPARTIE from PARTIE )
        bool = true ;
      end if;
    end if;
    if new.idPartie is null and new.idSon not in (select IDSon from PARTIE ) then
      select max(ID) into idN From launchpad ;
      idN = idN + 1 ;
      new.idPartie = idN ;
      bool = true ;
    end if;
    if not bool then 
      RAISE_APPLICATION_ERROR(-20178 ,'enregistrement non  possible');
    end if ;
end ;


create or replace trigger enregistrer_Partie
  before insert on Partie
  for each row
  declare
  idN integer;
  bool boolean;
  begin
    if new.idPartie in (select IDPARTIE from PARTIE )  then
      delete from PARTIE where idPartie is new.idPartie and SCORE < new.SCORE and idSon = new.idSon;
      if new.idPartie not in (select IDPARTIE from PARTIE )
        bool = true ;
      end if;
    end if;
    if new.idSon in (select IDSon from PARTIE )  then
      select idPartie int idn from Partie where idSon is new.idSon and and SCORE < new.SCORE 
      delete from PARTIE where idSon is new.idSon and and SCORE < new.SCORE ; 
      new.idPartie = idN ;
      if new.idPartie not in (select IDPARTIE from PARTIE )
        bool = true ;
      end if;
    end if;
    if new.idPartie is null and new.idSon not in (select IDSon from PARTIE ) then
      select max(ID) into idN From launchpad ;
      idN = idN + 1 ;
      new.idPartie = idN ;
      bool = true ;
    end if;
    if not bool then 
      RAISE_APPLICATION_ERROR(-20178 ,'enregistrement non  possible');
    end if ;
end ;


create or replace trigger enregistrer_touche
  before insert on construire
  for each row
  begin
    if new.id in (select ID from construire ) and new.N_touche in (select N_touche from construire  then
      delete from construire where id =  new.id  and N_touche = new.N_touche ; 
    end if;
end ;
  

