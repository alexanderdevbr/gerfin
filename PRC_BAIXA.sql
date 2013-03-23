SET TERM ^ ;

CREATE OR ALTER PROCEDURE PRC_BAIXA (
    id integer,
    mes integer,
    ano integer)
as
begin
    /*
    * Efetuando as baixas automatico
    * Para os valores do ID verificar TBLRELPGTABR
    */

    /* Bco Real */
    if (:id = 1) then begin
        update tblcrt set PGTO = 'P'
        where BCO = 5
          and EXTRACT(MONTH FROM DTAVENCFAT) = :mes
          and EXTRACT(YEAR  FROM DTAVENCFAT) = :ano;
    end

    /* Bco Brasil */
    if (:id = 2) then begin
        update tblcrt set PGTO = 'P'
        where BCO = 1
          and EXTRACT(MONTH FROM DTAVENCFAT) = :mes
          and EXTRACT(YEAR  FROM DTAVENCFAT) = :ano;
    end

    /* Extra */
    if (:id = 3) then begin
        update tblcrt set PGTO = 'P'
        where BCO = 7
          and EXTRACT(MONTH FROM DTAVENCFAT) = :mes
          and EXTRACT(YEAR  FROM DTAVENCFAT) = :ano;
    end

    /* Chq Real */
    if (:id = 4) then begin
        update tblchq set CHQSTA = 'B'
        where CNT = 5
          and Extract(Month from chqdtapre) = :mes
          and Extract(Year  from chqdtapre) = :ano;
    end

    /* Chq BB */
    if (:id = 5) then begin
        update tblchq set CHQSTA = 'B'
        where CNT = 1
          and Extract(Month from chqdtapre) = :mes
          and Extract(Year  from chqdtapre) = :ano;
    end

    /* Gastos Programados */
    if (:id = 6) then begin
        update tblgasprg set status = 'B'
         WHERE STATUS = 'A'
           and Extract(Month from dtavct) = :mes
           and Extract(Year  from dtavct) = :ano;
    end

    /* Gastos Barracao */
    if (:id = 7) then begin
    end

    /* Crt Unicard */
    if (:id = 8) then begin
        update tblcrt set PGTO = 'P'
        where BCO = 8
          and EXTRACT(MONTH FROM DTAVENCFAT) = :mes
          and EXTRACT(YEAR  FROM DTAVENCFAT) = :ano;
    end

end^

SET TERM ; ^

GRANT SELECT,UPDATE ON TBLCRT TO PROCEDURE PRC_BAIXA;

GRANT SELECT,UPDATE ON TBLCHQ TO PROCEDURE PRC_BAIXA;

GRANT SELECT,UPDATE ON TBLGASPRG TO PROCEDURE PRC_BAIXA;

GRANT EXECUTE ON PROCEDURE PRC_BAIXA TO SYSDBA;