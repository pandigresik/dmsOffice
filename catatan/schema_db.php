-- Table: public.account_account

-- DROP TABLE public.account_account;

CREATE TABLE IF NOT EXISTS public.account_account
(
    id integer NOT NULL DEFAULT nextval('account_account_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    currency_id integer,
    code character varying(64) COLLATE pg_catalog."default" NOT NULL,
    deprecated boolean,
    user_type_id integer NOT NULL,
    internal_type character varying COLLATE pg_catalog."default",
    internal_group character varying COLLATE pg_catalog."default",
    reconcile boolean,
    note text COLLATE pg_catalog."default",
    company_id integer NOT NULL,
    group_id integer,
    root_id integer,
    is_off_balance boolean,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT account_account_pkey PRIMARY KEY (id),
    CONSTRAINT account_account_code_company_uniq UNIQUE (code, company_id),
    CONSTRAINT account_account_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_account_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_account_currency_id_fkey FOREIGN KEY (currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_account_group_id_fkey FOREIGN KEY (group_id)
        REFERENCES public.account_group (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_account_user_type_id_fkey FOREIGN KEY (user_type_id)
        REFERENCES public.account_account_type (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_account_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.account_account
    OWNER to flectra;

COMMENT ON TABLE public.account_account
    IS 'Account';

COMMENT ON COLUMN public.account_account.name
    IS 'Account Name';

COMMENT ON COLUMN public.account_account.currency_id
    IS 'Account Currency';

COMMENT ON COLUMN public.account_account.code
    IS 'Code';

COMMENT ON COLUMN public.account_account.deprecated
    IS 'Deprecated';

COMMENT ON COLUMN public.account_account.user_type_id
    IS 'Type';

COMMENT ON COLUMN public.account_account.internal_type
    IS 'Internal Type';

COMMENT ON COLUMN public.account_account.internal_group
    IS 'Internal Group';

COMMENT ON COLUMN public.account_account.reconcile
    IS 'Allow Reconciliation';

COMMENT ON COLUMN public.account_account.note
    IS 'Internal Notes';

COMMENT ON COLUMN public.account_account.company_id
    IS 'Company';

COMMENT ON COLUMN public.account_account.group_id
    IS 'Group';

COMMENT ON COLUMN public.account_account.root_id
    IS 'Root';

COMMENT ON COLUMN public.account_account.is_off_balance
    IS 'Is Off Balance';

COMMENT ON COLUMN public.account_account.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.account_account.create_date
    IS 'Created on';

COMMENT ON COLUMN public.account_account.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.account_account.write_date
    IS 'Last Updated on';

COMMENT ON CONSTRAINT account_account_code_company_uniq ON public.account_account
    IS 'unique (code,company_id)';
-- Index: account_account_code_index

-- DROP INDEX public.account_account_code_index;

CREATE INDEX account_account_code_index
    ON public.account_account USING btree
    (code COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_account_deprecated_index

-- DROP INDEX public.account_account_deprecated_index;

CREATE INDEX account_account_deprecated_index
    ON public.account_account USING btree
    (deprecated ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_account_name_index

-- DROP INDEX public.account_account_name_index;

CREATE INDEX account_account_name_index
    ON public.account_account USING btree
    (name COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.account_account_type

-- DROP TABLE public.account_account_type;

CREATE TABLE IF NOT EXISTS public.account_account_type
(
    id integer NOT NULL DEFAULT nextval('account_account_type_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    include_initial_balance boolean,
    type character varying COLLATE pg_catalog."default" NOT NULL,
    internal_group character varying COLLATE pg_catalog."default" NOT NULL,
    note text COLLATE pg_catalog."default",
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT account_account_type_pkey PRIMARY KEY (id),
    CONSTRAINT account_account_type_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_account_type_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.account_account_type
    OWNER to flectra;

COMMENT ON TABLE public.account_account_type
    IS 'Account Type';

COMMENT ON COLUMN public.account_account_type.name
    IS 'Account Type';

COMMENT ON COLUMN public.account_account_type.include_initial_balance
    IS 'Bring Accounts Balance Forward';

COMMENT ON COLUMN public.account_account_type.type
    IS 'Type';

COMMENT ON COLUMN public.account_account_type.internal_group
    IS 'Internal Group';

COMMENT ON COLUMN public.account_account_type.note
    IS 'Description';

COMMENT ON COLUMN public.account_account_type.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.account_account_type.create_date
    IS 'Created on';

COMMENT ON COLUMN public.account_account_type.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.account_account_type.write_date
    IS 'Last Updated on';

-- Table: public.account_journal

-- DROP TABLE public.account_journal;

CREATE TABLE IF NOT EXISTS public.account_journal
(
    id integer NOT NULL DEFAULT nextval('account_journal_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    code character varying(5) COLLATE pg_catalog."default" NOT NULL,
    active boolean,
    type character varying COLLATE pg_catalog."default" NOT NULL,
    default_account_id integer,
    payment_debit_account_id integer,
    payment_credit_account_id integer,
    suspense_account_id integer,
    restrict_mode_hash_table boolean,
    sequence integer,
    invoice_reference_type character varying COLLATE pg_catalog."default" NOT NULL,
    invoice_reference_model character varying COLLATE pg_catalog."default" NOT NULL,
    currency_id integer,
    company_id integer NOT NULL,
    refund_sequence boolean,
    sequence_override_regex text COLLATE pg_catalog."default",
    at_least_one_inbound boolean,
    at_least_one_outbound boolean,
    profit_account_id integer,
    loss_account_id integer,
    bank_account_id integer,
    bank_statements_source character varying COLLATE pg_catalog."default",
    sale_activity_type_id integer,
    sale_activity_user_id integer,
    sale_activity_note text COLLATE pg_catalog."default",
    alias_id integer,
    secure_sequence_id integer,
    show_on_dashboard boolean,
    color integer,
    message_main_attachment_id integer,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    default_debit_account_id integer,
    default_credit_account_id integer,
    post_at character varying COLLATE pg_catalog."default",
    CONSTRAINT account_journal_pkey PRIMARY KEY (id),
    CONSTRAINT account_journal_code_company_uniq UNIQUE (code, name, company_id),
    CONSTRAINT account_journal_alias_id_fkey FOREIGN KEY (alias_id)
        REFERENCES public.mail_alias (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_journal_bank_account_id_fkey FOREIGN KEY (bank_account_id)
        REFERENCES public.res_partner_bank (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_journal_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_journal_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_journal_currency_id_fkey FOREIGN KEY (currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_journal_default_account_id_fkey FOREIGN KEY (default_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_journal_default_credit_account_id_fkey FOREIGN KEY (default_credit_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_journal_default_debit_account_id_fkey FOREIGN KEY (default_debit_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_journal_loss_account_id_fkey FOREIGN KEY (loss_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_journal_message_main_attachment_id_fkey FOREIGN KEY (message_main_attachment_id)
        REFERENCES public.ir_attachment (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_journal_payment_credit_account_id_fkey FOREIGN KEY (payment_credit_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_journal_payment_debit_account_id_fkey FOREIGN KEY (payment_debit_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_journal_profit_account_id_fkey FOREIGN KEY (profit_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_journal_sale_activity_type_id_fkey FOREIGN KEY (sale_activity_type_id)
        REFERENCES public.mail_activity_type (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_journal_sale_activity_user_id_fkey FOREIGN KEY (sale_activity_user_id)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_journal_secure_sequence_id_fkey FOREIGN KEY (secure_sequence_id)
        REFERENCES public.ir_sequence (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_journal_suspense_account_id_fkey FOREIGN KEY (suspense_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_journal_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.account_journal
    OWNER to flectra;

COMMENT ON TABLE public.account_journal
    IS 'Journal';

COMMENT ON COLUMN public.account_journal.name
    IS 'Journal Name';

COMMENT ON COLUMN public.account_journal.code
    IS 'Short Code';

COMMENT ON COLUMN public.account_journal.active
    IS 'Active';

COMMENT ON COLUMN public.account_journal.type
    IS 'Type';

COMMENT ON COLUMN public.account_journal.default_account_id
    IS 'Default Account';

COMMENT ON COLUMN public.account_journal.payment_debit_account_id
    IS 'Outstanding Receipts Account';

COMMENT ON COLUMN public.account_journal.payment_credit_account_id
    IS 'Outstanding Payments Account';

COMMENT ON COLUMN public.account_journal.suspense_account_id
    IS 'Suspense Account';

COMMENT ON COLUMN public.account_journal.restrict_mode_hash_table
    IS 'Lock Posted Entries with Hash';

COMMENT ON COLUMN public.account_journal.sequence
    IS 'Sequence';

COMMENT ON COLUMN public.account_journal.invoice_reference_type
    IS 'Communication Type';

COMMENT ON COLUMN public.account_journal.invoice_reference_model
    IS 'Communication Standard';

COMMENT ON COLUMN public.account_journal.currency_id
    IS 'Currency';

COMMENT ON COLUMN public.account_journal.company_id
    IS 'Company';

COMMENT ON COLUMN public.account_journal.refund_sequence
    IS 'Dedicated Credit Note Sequence';

COMMENT ON COLUMN public.account_journal.sequence_override_regex
    IS 'Sequence Override Regex';

COMMENT ON COLUMN public.account_journal.at_least_one_inbound
    IS 'At Least One Inbound';

COMMENT ON COLUMN public.account_journal.at_least_one_outbound
    IS 'At Least One Outbound';

COMMENT ON COLUMN public.account_journal.profit_account_id
    IS 'Profit Account';

COMMENT ON COLUMN public.account_journal.loss_account_id
    IS 'Loss Account';

COMMENT ON COLUMN public.account_journal.bank_account_id
    IS 'Bank Account';

COMMENT ON COLUMN public.account_journal.bank_statements_source
    IS 'Bank Feeds';

COMMENT ON COLUMN public.account_journal.sale_activity_type_id
    IS 'Schedule Activity';

COMMENT ON COLUMN public.account_journal.sale_activity_user_id
    IS 'Activity User';

COMMENT ON COLUMN public.account_journal.sale_activity_note
    IS 'Activity Summary';

COMMENT ON COLUMN public.account_journal.alias_id
    IS 'Email Alias';

COMMENT ON COLUMN public.account_journal.secure_sequence_id
    IS 'Secure Sequence';

COMMENT ON COLUMN public.account_journal.show_on_dashboard
    IS 'Show journal on dashboard';

COMMENT ON COLUMN public.account_journal.color
    IS 'Color Index';

COMMENT ON COLUMN public.account_journal.message_main_attachment_id
    IS 'Main Attachment';

COMMENT ON COLUMN public.account_journal.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.account_journal.create_date
    IS 'Created on';

COMMENT ON COLUMN public.account_journal.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.account_journal.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.account_journal.default_debit_account_id
    IS 'Default Debit Account';

COMMENT ON COLUMN public.account_journal.default_credit_account_id
    IS 'Default Credit Account';

COMMENT ON COLUMN public.account_journal.post_at
    IS 'Post At';

COMMENT ON CONSTRAINT account_journal_code_company_uniq ON public.account_journal
    IS 'unique (code, name, company_id)';
-- Index: account_journal_company_id_index

-- DROP INDEX public.account_journal_company_id_index;

CREATE INDEX account_journal_company_id_index
    ON public.account_journal USING btree
    (company_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_journal_message_main_attachment_id_index

-- DROP INDEX public.account_journal_message_main_attachment_id_index;

CREATE INDEX account_journal_message_main_attachment_id_index
    ON public.account_journal USING btree
    (message_main_attachment_id ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.account_move

-- DROP TABLE public.account_move;

CREATE TABLE IF NOT EXISTS public.account_move
(
    id integer NOT NULL DEFAULT nextval('account_move_id_seq'::regclass),
    access_token character varying COLLATE pg_catalog."default",
    name character varying COLLATE pg_catalog."default",
    date date NOT NULL,
    ref character varying COLLATE pg_catalog."default",
    narration text COLLATE pg_catalog."default",
    state character varying COLLATE pg_catalog."default" NOT NULL,
    posted_before boolean,
    move_type character varying COLLATE pg_catalog."default" NOT NULL,
    to_check boolean,
    journal_id integer NOT NULL,
    company_id integer,
    currency_id integer NOT NULL,
    partner_id integer,
    commercial_partner_id integer,
    is_move_sent boolean,
    partner_bank_id integer,
    payment_reference character varying COLLATE pg_catalog."default",
    payment_id integer,
    statement_line_id integer,
    amount_untaxed numeric,
    amount_tax numeric,
    amount_total numeric,
    amount_residual numeric,
    amount_untaxed_signed numeric,
    amount_tax_signed numeric,
    amount_total_signed numeric,
    amount_residual_signed numeric,
    payment_state character varying COLLATE pg_catalog."default",
    tax_cash_basis_rec_id integer,
    tax_cash_basis_move_id integer,
    auto_post boolean,
    reversed_entry_id integer,
    fiscal_position_id integer,
    invoice_user_id integer,
    invoice_date date,
    invoice_date_due date,
    invoice_origin character varying COLLATE pg_catalog."default",
    invoice_payment_term_id integer,
    invoice_incoterm_id integer,
    qr_code_method character varying COLLATE pg_catalog."default",
    invoice_source_email character varying COLLATE pg_catalog."default",
    invoice_partner_display_name character varying COLLATE pg_catalog."default",
    invoice_cash_rounding_id integer,
    secure_sequence_number integer,
    inalterable_hash character varying COLLATE pg_catalog."default",
    message_main_attachment_id integer,
    sequence_prefix character varying COLLATE pg_catalog."default",
    sequence_number integer,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    type character varying COLLATE pg_catalog."default" NOT NULL,
    invoice_payment_state character varying COLLATE pg_catalog."default",
    edi_state character varying COLLATE pg_catalog."default",
    l10n_id_tax_number character varying COLLATE pg_catalog."default",
    l10n_id_replace_invoice_id integer,
    l10n_id_attachment_id integer,
    l10n_id_kode_transaksi character varying COLLATE pg_catalog."default",
    stock_move_id integer,
    CONSTRAINT account_move_pkey PRIMARY KEY (id),
    CONSTRAINT account_move_commercial_partner_id_fkey FOREIGN KEY (commercial_partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_currency_id_fkey FOREIGN KEY (currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_move_fiscal_position_id_fkey FOREIGN KEY (fiscal_position_id)
        REFERENCES public.account_fiscal_position (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_move_invoice_cash_rounding_id_fkey FOREIGN KEY (invoice_cash_rounding_id)
        REFERENCES public.account_cash_rounding (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_invoice_incoterm_id_fkey FOREIGN KEY (invoice_incoterm_id)
        REFERENCES public.account_incoterms (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_invoice_payment_term_id_fkey FOREIGN KEY (invoice_payment_term_id)
        REFERENCES public.account_payment_term (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_invoice_user_id_fkey FOREIGN KEY (invoice_user_id)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_journal_id_fkey FOREIGN KEY (journal_id)
        REFERENCES public.account_journal (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_move_l10n_id_attachment_id_fkey FOREIGN KEY (l10n_id_attachment_id)
        REFERENCES public.ir_attachment (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_l10n_id_replace_invoice_id_fkey FOREIGN KEY (l10n_id_replace_invoice_id)
        REFERENCES public.account_move (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_message_main_attachment_id_fkey FOREIGN KEY (message_main_attachment_id)
        REFERENCES public.ir_attachment (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_partner_bank_id_fkey FOREIGN KEY (partner_bank_id)
        REFERENCES public.res_partner_bank (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_partner_id_fkey FOREIGN KEY (partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_payment_id_fkey FOREIGN KEY (payment_id)
        REFERENCES public.account_payment (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_reversed_entry_id_fkey FOREIGN KEY (reversed_entry_id)
        REFERENCES public.account_move (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_statement_line_id_fkey FOREIGN KEY (statement_line_id)
        REFERENCES public.account_bank_statement_line (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_stock_move_id_fkey FOREIGN KEY (stock_move_id)
        REFERENCES public.stock_move (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_tax_cash_basis_move_id_fkey FOREIGN KEY (tax_cash_basis_move_id)
        REFERENCES public.account_move (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_tax_cash_basis_rec_id_fkey FOREIGN KEY (tax_cash_basis_rec_id)
        REFERENCES public.account_partial_reconcile (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.account_move
    OWNER to flectra;

COMMENT ON TABLE public.account_move
    IS 'Journal Entry';

COMMENT ON COLUMN public.account_move.access_token
    IS 'Security Token';

COMMENT ON COLUMN public.account_move.name
    IS 'Number';

COMMENT ON COLUMN public.account_move.date
    IS 'Date';

COMMENT ON COLUMN public.account_move.ref
    IS 'Reference';

COMMENT ON COLUMN public.account_move.narration
    IS 'Terms and Conditions';

COMMENT ON COLUMN public.account_move.state
    IS 'Status';

COMMENT ON COLUMN public.account_move.posted_before
    IS 'Posted Before';

COMMENT ON COLUMN public.account_move.move_type
    IS 'Type';

COMMENT ON COLUMN public.account_move.to_check
    IS 'To Check';

COMMENT ON COLUMN public.account_move.journal_id
    IS 'Journal';

COMMENT ON COLUMN public.account_move.company_id
    IS 'Company';

COMMENT ON COLUMN public.account_move.currency_id
    IS 'Currency';

COMMENT ON COLUMN public.account_move.partner_id
    IS 'Partner';

COMMENT ON COLUMN public.account_move.commercial_partner_id
    IS 'Commercial Entity';

COMMENT ON COLUMN public.account_move.is_move_sent
    IS 'Is Move Sent';

COMMENT ON COLUMN public.account_move.partner_bank_id
    IS 'Recipient Bank';

COMMENT ON COLUMN public.account_move.payment_reference
    IS 'Payment Reference';

COMMENT ON COLUMN public.account_move.payment_id
    IS 'Payment';

COMMENT ON COLUMN public.account_move.statement_line_id
    IS 'Statement Line';

COMMENT ON COLUMN public.account_move.amount_untaxed
    IS 'Untaxed Amount';

COMMENT ON COLUMN public.account_move.amount_tax
    IS 'Tax';

COMMENT ON COLUMN public.account_move.amount_total
    IS 'Total';

COMMENT ON COLUMN public.account_move.amount_residual
    IS 'Amount Due';

COMMENT ON COLUMN public.account_move.amount_untaxed_signed
    IS 'Untaxed Amount Signed';

COMMENT ON COLUMN public.account_move.amount_tax_signed
    IS 'Tax Signed';

COMMENT ON COLUMN public.account_move.amount_total_signed
    IS 'Total Signed';

COMMENT ON COLUMN public.account_move.amount_residual_signed
    IS 'Amount Due Signed';

COMMENT ON COLUMN public.account_move.payment_state
    IS 'Payment Status';

COMMENT ON COLUMN public.account_move.tax_cash_basis_rec_id
    IS 'Tax Cash Basis Entry of';

COMMENT ON COLUMN public.account_move.tax_cash_basis_move_id
    IS 'Origin Tax Cash Basis Entry';

COMMENT ON COLUMN public.account_move.auto_post
    IS 'Post Automatically';

COMMENT ON COLUMN public.account_move.reversed_entry_id
    IS 'Reversal of';

COMMENT ON COLUMN public.account_move.fiscal_position_id
    IS 'Fiscal Position';

COMMENT ON COLUMN public.account_move.invoice_user_id
    IS 'Salesperson';

COMMENT ON COLUMN public.account_move.invoice_date
    IS 'Invoice/Bill Date';

COMMENT ON COLUMN public.account_move.invoice_date_due
    IS 'Due Date';

COMMENT ON COLUMN public.account_move.invoice_origin
    IS 'Origin';

COMMENT ON COLUMN public.account_move.invoice_payment_term_id
    IS 'Payment Terms';

COMMENT ON COLUMN public.account_move.invoice_incoterm_id
    IS 'Incoterm';

COMMENT ON COLUMN public.account_move.qr_code_method
    IS 'Payment QR-code';

COMMENT ON COLUMN public.account_move.invoice_source_email
    IS 'Source Email';

COMMENT ON COLUMN public.account_move.invoice_partner_display_name
    IS 'Invoice Partner Display Name';

COMMENT ON COLUMN public.account_move.invoice_cash_rounding_id
    IS 'Cash Rounding Method';

COMMENT ON COLUMN public.account_move.secure_sequence_number
    IS 'Inalteralbility No Gap Sequence #';

COMMENT ON COLUMN public.account_move.inalterable_hash
    IS 'Inalterability Hash';

COMMENT ON COLUMN public.account_move.message_main_attachment_id
    IS 'Main Attachment';

COMMENT ON COLUMN public.account_move.sequence_prefix
    IS 'Sequence Prefix';

COMMENT ON COLUMN public.account_move.sequence_number
    IS 'Sequence Number';

COMMENT ON COLUMN public.account_move.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.account_move.create_date
    IS 'Created on';

COMMENT ON COLUMN public.account_move.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.account_move.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.account_move.type
    IS 'Type';

COMMENT ON COLUMN public.account_move.invoice_payment_state
    IS 'Status of Payment';

COMMENT ON COLUMN public.account_move.edi_state
    IS 'Electronic invoicing';

COMMENT ON COLUMN public.account_move.l10n_id_tax_number
    IS 'Tax Number';

COMMENT ON COLUMN public.account_move.l10n_id_replace_invoice_id
    IS 'Replace Invoice';

COMMENT ON COLUMN public.account_move.l10n_id_attachment_id
    IS 'L10N Id Attachment';

COMMENT ON COLUMN public.account_move.l10n_id_kode_transaksi
    IS 'Kode Transaksi';

COMMENT ON COLUMN public.account_move.stock_move_id
    IS 'Stock Move';
-- Index: account_move_date_index

-- DROP INDEX public.account_move_date_index;

CREATE INDEX account_move_date_index
    ON public.account_move USING btree
    (date ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_invoice_date_due_index

-- DROP INDEX public.account_move_invoice_date_due_index;

CREATE INDEX account_move_invoice_date_due_index
    ON public.account_move USING btree
    (invoice_date_due ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_invoice_date_index

-- DROP INDEX public.account_move_invoice_date_index;

CREATE INDEX account_move_invoice_date_index
    ON public.account_move USING btree
    (invoice_date ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_message_main_attachment_id_index

-- DROP INDEX public.account_move_message_main_attachment_id_index;

CREATE INDEX account_move_message_main_attachment_id_index
    ON public.account_move USING btree
    (message_main_attachment_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_move_type_index

-- DROP INDEX public.account_move_move_type_index;

CREATE INDEX account_move_move_type_index
    ON public.account_move USING btree
    (move_type COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_name_index

-- DROP INDEX public.account_move_name_index;

CREATE INDEX account_move_name_index
    ON public.account_move USING btree
    (name COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_payment_id_index

-- DROP INDEX public.account_move_payment_id_index;

CREATE INDEX account_move_payment_id_index
    ON public.account_move USING btree
    (payment_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_payment_reference_index

-- DROP INDEX public.account_move_payment_reference_index;

CREATE INDEX account_move_payment_reference_index
    ON public.account_move USING btree
    (payment_reference COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_sequence_index

-- DROP INDEX public.account_move_sequence_index;

CREATE INDEX account_move_sequence_index
    ON public.account_move USING btree
    (journal_id ASC NULLS LAST, sequence_prefix COLLATE pg_catalog."default" DESC NULLS FIRST, sequence_number DESC NULLS FIRST, name COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_sequence_index2

-- DROP INDEX public.account_move_sequence_index2;

CREATE INDEX account_move_sequence_index2
    ON public.account_move USING btree
    (journal_id ASC NULLS LAST, id DESC NULLS FIRST, sequence_prefix COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_stock_move_id_index

-- DROP INDEX public.account_move_stock_move_id_index;

CREATE INDEX account_move_stock_move_id_index
    ON public.account_move USING btree
    (stock_move_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_type_index

-- DROP INDEX public.account_move_type_index;

CREATE INDEX account_move_type_index
    ON public.account_move USING btree
    (type COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.account_move_line

-- DROP TABLE public.account_move_line;

CREATE TABLE IF NOT EXISTS public.account_move_line
(
    id integer NOT NULL DEFAULT nextval('account_move_line_id_seq'::regclass),
    move_id integer NOT NULL,
    move_name character varying COLLATE pg_catalog."default",
    date date,
    ref character varying COLLATE pg_catalog."default",
    parent_state character varying COLLATE pg_catalog."default",
    journal_id integer,
    company_id integer,
    company_currency_id integer,
    account_id integer,
    account_root_id integer,
    sequence integer,
    name character varying COLLATE pg_catalog."default",
    quantity numeric,
    price_unit numeric,
    discount numeric,
    debit numeric,
    credit numeric,
    balance numeric,
    amount_currency numeric,
    price_subtotal numeric,
    price_total numeric,
    reconciled boolean,
    blocked boolean,
    date_maturity date,
    currency_id integer NOT NULL,
    partner_id integer,
    product_uom_id integer,
    product_id integer,
    reconcile_model_id integer,
    payment_id integer,
    statement_line_id integer,
    statement_id integer,
    tax_line_id integer,
    tax_group_id integer,
    tax_base_amount numeric,
    tax_exigible boolean,
    tax_repartition_line_id integer,
    tax_audit character varying COLLATE pg_catalog."default",
    amount_residual numeric,
    amount_residual_currency numeric,
    full_reconcile_id integer,
    matching_number character varying COLLATE pg_catalog."default",
    analytic_account_id integer,
    display_type character varying COLLATE pg_catalog."default",
    is_rounding_line boolean,
    exclude_from_invoice_tab boolean,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    asset_category_id integer,
    asset_start_date date,
    asset_end_date date,
    asset_mrr numeric,
    purchase_line_id integer,
    expense_id integer,
    is_anglo_saxon_line boolean,
    CONSTRAINT account_move_line_pkey PRIMARY KEY (id),
    CONSTRAINT account_move_line_account_id_fkey FOREIGN KEY (account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT account_move_line_analytic_account_id_fkey FOREIGN KEY (analytic_account_id)
        REFERENCES public.account_analytic_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_asset_category_id_fkey FOREIGN KEY (asset_category_id)
        REFERENCES public.account_asset_category (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_company_currency_id_fkey FOREIGN KEY (company_currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_currency_id_fkey FOREIGN KEY (currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_move_line_expense_id_fkey FOREIGN KEY (expense_id)
        REFERENCES public.hr_expense (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_full_reconcile_id_fkey FOREIGN KEY (full_reconcile_id)
        REFERENCES public.account_full_reconcile (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_journal_id_fkey FOREIGN KEY (journal_id)
        REFERENCES public.account_journal (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_move_id_fkey FOREIGN KEY (move_id)
        REFERENCES public.account_move (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT account_move_line_partner_id_fkey FOREIGN KEY (partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_move_line_payment_id_fkey FOREIGN KEY (payment_id)
        REFERENCES public.account_payment (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_product_id_fkey FOREIGN KEY (product_id)
        REFERENCES public.product_product (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_move_line_product_uom_id_fkey FOREIGN KEY (product_uom_id)
        REFERENCES public.uom_uom (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_purchase_line_id_fkey FOREIGN KEY (purchase_line_id)
        REFERENCES public.purchase_order_line (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_reconcile_model_id_fkey FOREIGN KEY (reconcile_model_id)
        REFERENCES public.account_reconcile_model (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_statement_id_fkey FOREIGN KEY (statement_id)
        REFERENCES public.account_bank_statement (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_statement_line_id_fkey FOREIGN KEY (statement_line_id)
        REFERENCES public.account_bank_statement_line (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_tax_group_id_fkey FOREIGN KEY (tax_group_id)
        REFERENCES public.account_tax_group (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_tax_line_id_fkey FOREIGN KEY (tax_line_id)
        REFERENCES public.account_tax (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_move_line_tax_repartition_line_id_fkey FOREIGN KEY (tax_repartition_line_id)
        REFERENCES public.account_tax_repartition_line (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_move_line_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_move_line_check_accountable_required_fields CHECK (COALESCE(display_type::text = ANY (ARRAY['line_section'::character varying, 'line_note'::character varying]::text[]), false) OR account_id IS NOT NULL),
    CONSTRAINT account_move_line_check_amount_currency_balance_sign CHECK (currency_id <> company_currency_id AND ((debit - credit) <= 0::numeric AND amount_currency <= 0::numeric OR (debit - credit) >= 0::numeric AND amount_currency >= 0::numeric) OR currency_id = company_currency_id AND round(debit - credit - amount_currency, 2) = 0::numeric),
    CONSTRAINT account_move_line_check_credit_debit CHECK ((credit + debit) >= 0::numeric AND (credit * debit) = 0::numeric),
    CONSTRAINT account_move_line_check_non_accountable_fields_null CHECK ((display_type::text <> ALL (ARRAY['line_section'::character varying, 'line_note'::character varying]::text[])) OR amount_currency = 0::numeric AND debit = 0::numeric AND credit = 0::numeric AND account_id IS NULL)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.account_move_line
    OWNER to flectra;

COMMENT ON TABLE public.account_move_line
    IS 'Journal Item';

COMMENT ON COLUMN public.account_move_line.move_id
    IS 'Journal Entry';

COMMENT ON COLUMN public.account_move_line.move_name
    IS 'Number';

COMMENT ON COLUMN public.account_move_line.date
    IS 'Date';

COMMENT ON COLUMN public.account_move_line.ref
    IS 'Reference';

COMMENT ON COLUMN public.account_move_line.parent_state
    IS 'Status';

COMMENT ON COLUMN public.account_move_line.journal_id
    IS 'Journal';

COMMENT ON COLUMN public.account_move_line.company_id
    IS 'Company';

COMMENT ON COLUMN public.account_move_line.company_currency_id
    IS 'Company Currency';

COMMENT ON COLUMN public.account_move_line.account_id
    IS 'Account';

COMMENT ON COLUMN public.account_move_line.account_root_id
    IS 'Account Root';

COMMENT ON COLUMN public.account_move_line.sequence
    IS 'Sequence';

COMMENT ON COLUMN public.account_move_line.name
    IS 'Label';

COMMENT ON COLUMN public.account_move_line.quantity
    IS 'Quantity';

COMMENT ON COLUMN public.account_move_line.price_unit
    IS 'Unit Price';

COMMENT ON COLUMN public.account_move_line.discount
    IS 'Discount (%)';

COMMENT ON COLUMN public.account_move_line.debit
    IS 'Debit';

COMMENT ON COLUMN public.account_move_line.credit
    IS 'Credit';

COMMENT ON COLUMN public.account_move_line.balance
    IS 'Balance';

COMMENT ON COLUMN public.account_move_line.amount_currency
    IS 'Amount in Currency';

COMMENT ON COLUMN public.account_move_line.price_subtotal
    IS 'Subtotal';

COMMENT ON COLUMN public.account_move_line.price_total
    IS 'Total';

COMMENT ON COLUMN public.account_move_line.reconciled
    IS 'Reconciled';

COMMENT ON COLUMN public.account_move_line.blocked
    IS 'No Follow-up';

COMMENT ON COLUMN public.account_move_line.date_maturity
    IS 'Due Date';

COMMENT ON COLUMN public.account_move_line.currency_id
    IS 'Currency';

COMMENT ON COLUMN public.account_move_line.partner_id
    IS 'Partner';

COMMENT ON COLUMN public.account_move_line.product_uom_id
    IS 'Unit of Measure';

COMMENT ON COLUMN public.account_move_line.product_id
    IS 'Product';

COMMENT ON COLUMN public.account_move_line.reconcile_model_id
    IS 'Reconciliation Model';

COMMENT ON COLUMN public.account_move_line.payment_id
    IS 'Originator Payment';

COMMENT ON COLUMN public.account_move_line.statement_line_id
    IS 'Originator Statement Line';

COMMENT ON COLUMN public.account_move_line.statement_id
    IS 'Statement';

COMMENT ON COLUMN public.account_move_line.tax_line_id
    IS 'Originator Tax';

COMMENT ON COLUMN public.account_move_line.tax_group_id
    IS 'Originator tax group';

COMMENT ON COLUMN public.account_move_line.tax_base_amount
    IS 'Base Amount';

COMMENT ON COLUMN public.account_move_line.tax_exigible
    IS 'Appears in VAT report';

COMMENT ON COLUMN public.account_move_line.tax_repartition_line_id
    IS 'Originator Tax Distribution Line';

COMMENT ON COLUMN public.account_move_line.tax_audit
    IS 'Tax Audit String';

COMMENT ON COLUMN public.account_move_line.amount_residual
    IS 'Residual Amount';

COMMENT ON COLUMN public.account_move_line.amount_residual_currency
    IS 'Residual Amount in Currency';

COMMENT ON COLUMN public.account_move_line.full_reconcile_id
    IS 'Matching';

COMMENT ON COLUMN public.account_move_line.matching_number
    IS 'Matching #';

COMMENT ON COLUMN public.account_move_line.analytic_account_id
    IS 'Analytic Account';

COMMENT ON COLUMN public.account_move_line.display_type
    IS 'Display Type';

COMMENT ON COLUMN public.account_move_line.is_rounding_line
    IS 'Is Rounding Line';

COMMENT ON COLUMN public.account_move_line.exclude_from_invoice_tab
    IS 'Exclude From Invoice Tab';

COMMENT ON COLUMN public.account_move_line.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.account_move_line.create_date
    IS 'Created on';

COMMENT ON COLUMN public.account_move_line.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.account_move_line.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.account_move_line.asset_category_id
    IS 'Asset Category';

COMMENT ON COLUMN public.account_move_line.asset_start_date
    IS 'Asset Start Date';

COMMENT ON COLUMN public.account_move_line.asset_end_date
    IS 'Asset End Date';

COMMENT ON COLUMN public.account_move_line.asset_mrr
    IS 'Monthly Recurring Revenue';

COMMENT ON COLUMN public.account_move_line.purchase_line_id
    IS 'Purchase Order Line';

COMMENT ON COLUMN public.account_move_line.expense_id
    IS 'Expense';

COMMENT ON COLUMN public.account_move_line.is_anglo_saxon_line
    IS 'Is Anglo Saxon Line';

COMMENT ON CONSTRAINT account_move_line_check_accountable_required_fields ON public.account_move_line
    IS 'CHECK(COALESCE(display_type IN (''line_section'', ''line_note''), ''f'') OR account_id IS NOT NULL)';
COMMENT ON CONSTRAINT account_move_line_check_amount_currency_balance_sign ON public.account_move_line
    IS 'CHECK(
                (
                    (currency_id != company_currency_id)
                    AND
                    (
                        (debit - credit <= 0 AND amount_currency <= 0)
                        OR
                        (debit - credit >= 0 AND amount_currency >= 0)
                    )
                )
                OR
                (
                    currency_id = company_currency_id
                    AND
                    ROUND(debit - credit - amount_currency, 2) = 0
                )
            )';
COMMENT ON CONSTRAINT account_move_line_check_credit_debit ON public.account_move_line
    IS 'CHECK(credit + debit>=0 AND credit * debit=0)';
COMMENT ON CONSTRAINT account_move_line_check_non_accountable_fields_null ON public.account_move_line
    IS 'CHECK(display_type NOT IN (''line_section'', ''line_note'') OR (amount_currency = 0 AND debit = 0 AND credit = 0 AND account_id IS NULL))';
-- Index: account_move_line_account_id_index

-- DROP INDEX public.account_move_line_account_id_index;

CREATE INDEX account_move_line_account_id_index
    ON public.account_move_line USING btree
    (account_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_analytic_account_id_index

-- DROP INDEX public.account_move_line_analytic_account_id_index;

CREATE INDEX account_move_line_analytic_account_id_index
    ON public.account_move_line USING btree
    (analytic_account_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_date_index

-- DROP INDEX public.account_move_line_date_index;

CREATE INDEX account_move_line_date_index
    ON public.account_move_line USING btree
    (date ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_date_maturity_index

-- DROP INDEX public.account_move_line_date_maturity_index;

CREATE INDEX account_move_line_date_maturity_index
    ON public.account_move_line USING btree
    (date_maturity ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_full_reconcile_id_index

-- DROP INDEX public.account_move_line_full_reconcile_id_index;

CREATE INDEX account_move_line_full_reconcile_id_index
    ON public.account_move_line USING btree
    (full_reconcile_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_journal_id_index

-- DROP INDEX public.account_move_line_journal_id_index;

CREATE INDEX account_move_line_journal_id_index
    ON public.account_move_line USING btree
    (journal_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_move_id_index

-- DROP INDEX public.account_move_line_move_id_index;

CREATE INDEX account_move_line_move_id_index
    ON public.account_move_line USING btree
    (move_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_move_name_index

-- DROP INDEX public.account_move_line_move_name_index;

CREATE INDEX account_move_line_move_name_index
    ON public.account_move_line USING btree
    (move_name COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_partner_id_ref_idx

-- DROP INDEX public.account_move_line_partner_id_ref_idx;

CREATE INDEX account_move_line_partner_id_ref_idx
    ON public.account_move_line USING btree
    (partner_id ASC NULLS LAST, ref COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_payment_id_index

-- DROP INDEX public.account_move_line_payment_id_index;

CREATE INDEX account_move_line_payment_id_index
    ON public.account_move_line USING btree
    (payment_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_purchase_line_id_index

-- DROP INDEX public.account_move_line_purchase_line_id_index;

CREATE INDEX account_move_line_purchase_line_id_index
    ON public.account_move_line USING btree
    (purchase_line_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_ref_index

-- DROP INDEX public.account_move_line_ref_index;

CREATE INDEX account_move_line_ref_index
    ON public.account_move_line USING btree
    (ref COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_statement_id_index

-- DROP INDEX public.account_move_line_statement_id_index;

CREATE INDEX account_move_line_statement_id_index
    ON public.account_move_line USING btree
    (statement_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: account_move_line_statement_line_id_index

-- DROP INDEX public.account_move_line_statement_line_id_index;

CREATE INDEX account_move_line_statement_line_id_index
    ON public.account_move_line USING btree
    (statement_line_id ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.account_payment

-- DROP TABLE public.account_payment;

CREATE TABLE IF NOT EXISTS public.account_payment
(
    id integer NOT NULL DEFAULT nextval('account_payment_id_seq'::regclass),
    move_id integer NOT NULL,
    is_reconciled boolean,
    is_matched boolean,
    partner_bank_id integer,
    is_internal_transfer boolean,
    payment_method_id integer,
    amount numeric,
    payment_type character varying COLLATE pg_catalog."default" NOT NULL,
    partner_type character varying COLLATE pg_catalog."default" NOT NULL,
    payment_reference character varying COLLATE pg_catalog."default",
    currency_id integer,
    partner_id integer,
    destination_account_id integer,
    message_main_attachment_id integer,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    payment_date date NOT NULL,
    communication character varying COLLATE pg_catalog."default",
    payment_transaction_id integer,
    payment_token_id integer,
    CONSTRAINT account_payment_pkey PRIMARY KEY (id),
    CONSTRAINT account_payment_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_currency_id_fkey FOREIGN KEY (currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_destination_account_id_fkey FOREIGN KEY (destination_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_message_main_attachment_id_fkey FOREIGN KEY (message_main_attachment_id)
        REFERENCES public.ir_attachment (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_move_id_fkey FOREIGN KEY (move_id)
        REFERENCES public.account_move (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT account_payment_partner_bank_id_fkey FOREIGN KEY (partner_bank_id)
        REFERENCES public.res_partner_bank (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_partner_id_fkey FOREIGN KEY (partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_payment_payment_method_id_fkey FOREIGN KEY (payment_method_id)
        REFERENCES public.account_payment_method (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_payment_token_id_fkey FOREIGN KEY (payment_token_id)
        REFERENCES public.payment_token (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_payment_transaction_id_fkey FOREIGN KEY (payment_transaction_id)
        REFERENCES public.payment_transaction (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_check_amount_not_negative CHECK (amount >= 0.0)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.account_payment
    OWNER to flectra;

COMMENT ON TABLE public.account_payment
    IS 'Payments';

COMMENT ON COLUMN public.account_payment.move_id
    IS 'Journal Entry';

COMMENT ON COLUMN public.account_payment.is_reconciled
    IS 'Is Reconciled';

COMMENT ON COLUMN public.account_payment.is_matched
    IS 'Is Matched With a Bank Statement';

COMMENT ON COLUMN public.account_payment.partner_bank_id
    IS 'Recipient Bank Account';

COMMENT ON COLUMN public.account_payment.is_internal_transfer
    IS 'Is Internal Transfer';

COMMENT ON COLUMN public.account_payment.payment_method_id
    IS 'Payment Method';

COMMENT ON COLUMN public.account_payment.amount
    IS 'Amount';

COMMENT ON COLUMN public.account_payment.payment_type
    IS 'Payment Type';

COMMENT ON COLUMN public.account_payment.partner_type
    IS 'Partner Type';

COMMENT ON COLUMN public.account_payment.payment_reference
    IS 'Payment Reference';

COMMENT ON COLUMN public.account_payment.currency_id
    IS 'Currency';

COMMENT ON COLUMN public.account_payment.partner_id
    IS 'Customer/Vendor';

COMMENT ON COLUMN public.account_payment.destination_account_id
    IS 'Destination Account';

COMMENT ON COLUMN public.account_payment.message_main_attachment_id
    IS 'Main Attachment';

COMMENT ON COLUMN public.account_payment.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.account_payment.create_date
    IS 'Created on';

COMMENT ON COLUMN public.account_payment.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.account_payment.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.account_payment.payment_date
    IS 'Payment Date';

COMMENT ON COLUMN public.account_payment.communication
    IS 'Memo';

COMMENT ON COLUMN public.account_payment.payment_transaction_id
    IS 'Payment Transaction';

COMMENT ON COLUMN public.account_payment.payment_token_id
    IS 'Saved payment token';

COMMENT ON CONSTRAINT account_payment_check_amount_not_negative ON public.account_payment
    IS 'CHECK(amount >= 0.0)';
-- Index: account_payment_message_main_attachment_id_index

-- DROP INDEX public.account_payment_message_main_attachment_id_index;

CREATE INDEX account_payment_message_main_attachment_id_index
    ON public.account_payment USING btree
    (message_main_attachment_id ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.account_payment_method

-- DROP TABLE public.account_payment_method;

CREATE TABLE IF NOT EXISTS public.account_payment_method
(
    id integer NOT NULL DEFAULT nextval('account_payment_method_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    code character varying COLLATE pg_catalog."default" NOT NULL,
    payment_type character varying COLLATE pg_catalog."default" NOT NULL,
    sequence integer,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT account_payment_method_pkey PRIMARY KEY (id),
    CONSTRAINT account_payment_method_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_method_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.account_payment_method
    OWNER to flectra;

COMMENT ON TABLE public.account_payment_method
    IS 'Payment Methods';

COMMENT ON COLUMN public.account_payment_method.name
    IS 'Name';

COMMENT ON COLUMN public.account_payment_method.code
    IS 'Code';

COMMENT ON COLUMN public.account_payment_method.payment_type
    IS 'Payment Type';

COMMENT ON COLUMN public.account_payment_method.sequence
    IS 'Sequence';

COMMENT ON COLUMN public.account_payment_method.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.account_payment_method.create_date
    IS 'Created on';

COMMENT ON COLUMN public.account_payment_method.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.account_payment_method.write_date
    IS 'Last Updated on';

-- Table: public.account_payment_register

-- DROP TABLE public.account_payment_register;

CREATE TABLE IF NOT EXISTS public.account_payment_register
(
    id integer NOT NULL DEFAULT nextval('account_payment_register_id_seq'::regclass),
    payment_date date NOT NULL,
    amount numeric,
    communication character varying COLLATE pg_catalog."default",
    group_payment boolean,
    currency_id integer,
    journal_id integer,
    partner_bank_id integer,
    payment_type character varying COLLATE pg_catalog."default",
    partner_type character varying COLLATE pg_catalog."default",
    source_amount numeric,
    source_amount_currency numeric,
    source_currency_id integer,
    can_edit_wizard boolean,
    can_group_payments boolean,
    company_id integer,
    partner_id integer,
    payment_method_id integer,
    payment_difference_handling character varying COLLATE pg_catalog."default",
    writeoff_account_id integer,
    writeoff_label character varying COLLATE pg_catalog."default",
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    payment_token_id integer,
    CONSTRAINT account_payment_register_pkey PRIMARY KEY (id),
    CONSTRAINT account_payment_register_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_register_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_register_currency_id_fkey FOREIGN KEY (currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_register_journal_id_fkey FOREIGN KEY (journal_id)
        REFERENCES public.account_journal (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_register_partner_bank_id_fkey FOREIGN KEY (partner_bank_id)
        REFERENCES public.res_partner_bank (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_register_partner_id_fkey FOREIGN KEY (partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT account_payment_register_payment_method_id_fkey FOREIGN KEY (payment_method_id)
        REFERENCES public.account_payment_method (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_register_payment_token_id_fkey FOREIGN KEY (payment_token_id)
        REFERENCES public.payment_token (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_register_source_currency_id_fkey FOREIGN KEY (source_currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_register_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT account_payment_register_writeoff_account_id_fkey FOREIGN KEY (writeoff_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.account_payment_register
    OWNER to flectra;

COMMENT ON TABLE public.account_payment_register
    IS 'Register Payment';

COMMENT ON COLUMN public.account_payment_register.payment_date
    IS 'Payment Date';

COMMENT ON COLUMN public.account_payment_register.amount
    IS 'Amount';

COMMENT ON COLUMN public.account_payment_register.communication
    IS 'Memo';

COMMENT ON COLUMN public.account_payment_register.group_payment
    IS 'Group Payments';

COMMENT ON COLUMN public.account_payment_register.currency_id
    IS 'Currency';

COMMENT ON COLUMN public.account_payment_register.journal_id
    IS 'Journal';

COMMENT ON COLUMN public.account_payment_register.partner_bank_id
    IS 'Recipient Bank Account';

COMMENT ON COLUMN public.account_payment_register.payment_type
    IS 'Payment Type';

COMMENT ON COLUMN public.account_payment_register.partner_type
    IS 'Partner Type';

COMMENT ON COLUMN public.account_payment_register.source_amount
    IS 'Amount to Pay (company currency)';

COMMENT ON COLUMN public.account_payment_register.source_amount_currency
    IS 'Amount to Pay (foreign currency)';

COMMENT ON COLUMN public.account_payment_register.source_currency_id
    IS 'Source Currency';

COMMENT ON COLUMN public.account_payment_register.can_edit_wizard
    IS 'Can Edit Wizard';

COMMENT ON COLUMN public.account_payment_register.can_group_payments
    IS 'Can Group Payments';

COMMENT ON COLUMN public.account_payment_register.company_id
    IS 'Company';

COMMENT ON COLUMN public.account_payment_register.partner_id
    IS 'Customer/Vendor';

COMMENT ON COLUMN public.account_payment_register.payment_method_id
    IS 'Payment Method';

COMMENT ON COLUMN public.account_payment_register.payment_difference_handling
    IS 'Payment Difference Handling';

COMMENT ON COLUMN public.account_payment_register.writeoff_account_id
    IS 'Difference Account';

COMMENT ON COLUMN public.account_payment_register.writeoff_label
    IS 'Journal Item Label';

COMMENT ON COLUMN public.account_payment_register.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.account_payment_register.create_date
    IS 'Created on';

COMMENT ON COLUMN public.account_payment_register.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.account_payment_register.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.account_payment_register.payment_token_id
    IS 'Saved payment token';

-- Table: public.product_category

-- DROP TABLE public.product_category;

CREATE TABLE IF NOT EXISTS public.product_category
(
    id integer NOT NULL DEFAULT nextval('product_category_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    complete_name character varying COLLATE pg_catalog."default",
    parent_id integer,
    parent_path character varying COLLATE pg_catalog."default",
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    removal_strategy_id integer,
    CONSTRAINT product_category_pkey PRIMARY KEY (id),
    CONSTRAINT product_category_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT product_category_parent_id_fkey FOREIGN KEY (parent_id)
        REFERENCES public.product_category (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT product_category_removal_strategy_id_fkey FOREIGN KEY (removal_strategy_id)
        REFERENCES public.product_removal (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT product_category_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.product_category
    OWNER to flectra;

COMMENT ON TABLE public.product_category
    IS 'Product Category';

COMMENT ON COLUMN public.product_category.name
    IS 'Name';

COMMENT ON COLUMN public.product_category.complete_name
    IS 'Complete Name';

COMMENT ON COLUMN public.product_category.parent_id
    IS 'Parent Category';

COMMENT ON COLUMN public.product_category.parent_path
    IS 'Parent Path';

COMMENT ON COLUMN public.product_category.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.product_category.create_date
    IS 'Created on';

COMMENT ON COLUMN public.product_category.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.product_category.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.product_category.removal_strategy_id
    IS 'Force Removal Strategy';
-- Index: product_category_name_index

-- DROP INDEX public.product_category_name_index;

CREATE INDEX product_category_name_index
    ON public.product_category USING btree
    (name COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: product_category_parent_id_index

-- DROP INDEX public.product_category_parent_id_index;

CREATE INDEX product_category_parent_id_index
    ON public.product_category USING btree
    (parent_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: product_category_parent_path_index

-- DROP INDEX public.product_category_parent_path_index;

CREATE INDEX product_category_parent_path_index
    ON public.product_category USING btree
    (parent_path COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.product_pricelist

-- DROP TABLE public.product_pricelist;

CREATE TABLE IF NOT EXISTS public.product_pricelist
(
    id integer NOT NULL DEFAULT nextval('product_pricelist_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    active boolean,
    currency_id integer NOT NULL,
    company_id integer,
    sequence integer,
    discount_policy character varying COLLATE pg_catalog."default" NOT NULL,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT product_pricelist_pkey PRIMARY KEY (id),
    CONSTRAINT product_pricelist_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT product_pricelist_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT product_pricelist_currency_id_fkey FOREIGN KEY (currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT product_pricelist_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.product_pricelist
    OWNER to flectra;

COMMENT ON TABLE public.product_pricelist
    IS 'Pricelist';

COMMENT ON COLUMN public.product_pricelist.name
    IS 'Pricelist Name';

COMMENT ON COLUMN public.product_pricelist.active
    IS 'Active';

COMMENT ON COLUMN public.product_pricelist.currency_id
    IS 'Currency';

COMMENT ON COLUMN public.product_pricelist.company_id
    IS 'Company';

COMMENT ON COLUMN public.product_pricelist.sequence
    IS 'Sequence';

COMMENT ON COLUMN public.product_pricelist.discount_policy
    IS 'Discount Policy';

COMMENT ON COLUMN public.product_pricelist.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.product_pricelist.create_date
    IS 'Created on';

COMMENT ON COLUMN public.product_pricelist.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.product_pricelist.write_date
    IS 'Last Updated on';

-- Table: public.product_pricelist_item

-- DROP TABLE public.product_pricelist_item;

CREATE TABLE IF NOT EXISTS public.product_pricelist_item
(
    id integer NOT NULL DEFAULT nextval('product_pricelist_item_id_seq'::regclass),
    product_tmpl_id integer,
    product_id integer,
    categ_id integer,
    min_quantity numeric,
    applied_on character varying COLLATE pg_catalog."default" NOT NULL,
    base character varying COLLATE pg_catalog."default" NOT NULL,
    base_pricelist_id integer,
    pricelist_id integer NOT NULL,
    price_surcharge numeric,
    price_discount numeric,
    price_round numeric,
    price_min_margin numeric,
    price_max_margin numeric,
    company_id integer,
    currency_id integer,
    active boolean,
    date_start timestamp without time zone,
    date_end timestamp without time zone,
    compute_price character varying COLLATE pg_catalog."default" NOT NULL,
    fixed_price numeric,
    percent_price double precision,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT product_pricelist_item_pkey PRIMARY KEY (id),
    CONSTRAINT product_pricelist_item_base_pricelist_id_fkey FOREIGN KEY (base_pricelist_id)
        REFERENCES public.product_pricelist (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT product_pricelist_item_categ_id_fkey FOREIGN KEY (categ_id)
        REFERENCES public.product_category (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT product_pricelist_item_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT product_pricelist_item_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT product_pricelist_item_currency_id_fkey FOREIGN KEY (currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT product_pricelist_item_pricelist_id_fkey FOREIGN KEY (pricelist_id)
        REFERENCES public.product_pricelist (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT product_pricelist_item_product_id_fkey FOREIGN KEY (product_id)
        REFERENCES public.product_product (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT product_pricelist_item_product_tmpl_id_fkey FOREIGN KEY (product_tmpl_id)
        REFERENCES public.product_template (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT product_pricelist_item_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.product_pricelist_item
    OWNER to flectra;

COMMENT ON TABLE public.product_pricelist_item
    IS 'Pricelist Rule';

COMMENT ON COLUMN public.product_pricelist_item.product_tmpl_id
    IS 'Product';

COMMENT ON COLUMN public.product_pricelist_item.product_id
    IS 'Product Variant';

COMMENT ON COLUMN public.product_pricelist_item.categ_id
    IS 'Product Category';

COMMENT ON COLUMN public.product_pricelist_item.min_quantity
    IS 'Min. Quantity';

COMMENT ON COLUMN public.product_pricelist_item.applied_on
    IS 'Apply On';

COMMENT ON COLUMN public.product_pricelist_item.base
    IS 'Based on';

COMMENT ON COLUMN public.product_pricelist_item.base_pricelist_id
    IS 'Other Pricelist';

COMMENT ON COLUMN public.product_pricelist_item.pricelist_id
    IS 'Pricelist';

COMMENT ON COLUMN public.product_pricelist_item.price_surcharge
    IS 'Price Surcharge';

COMMENT ON COLUMN public.product_pricelist_item.price_discount
    IS 'Price Discount';

COMMENT ON COLUMN public.product_pricelist_item.price_round
    IS 'Price Rounding';

COMMENT ON COLUMN public.product_pricelist_item.price_min_margin
    IS 'Min. Price Margin';

COMMENT ON COLUMN public.product_pricelist_item.price_max_margin
    IS 'Max. Price Margin';

COMMENT ON COLUMN public.product_pricelist_item.company_id
    IS 'Company';

COMMENT ON COLUMN public.product_pricelist_item.currency_id
    IS 'Currency';

COMMENT ON COLUMN public.product_pricelist_item.active
    IS 'Active';

COMMENT ON COLUMN public.product_pricelist_item.date_start
    IS 'Start Date';

COMMENT ON COLUMN public.product_pricelist_item.date_end
    IS 'End Date';

COMMENT ON COLUMN public.product_pricelist_item.compute_price
    IS 'Compute Price';

COMMENT ON COLUMN public.product_pricelist_item.fixed_price
    IS 'Fixed Price';

COMMENT ON COLUMN public.product_pricelist_item.percent_price
    IS 'Percentage Price';

COMMENT ON COLUMN public.product_pricelist_item.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.product_pricelist_item.create_date
    IS 'Created on';

COMMENT ON COLUMN public.product_pricelist_item.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.product_pricelist_item.write_date
    IS 'Last Updated on';
-- Index: product_pricelist_item_compute_price_index

-- DROP INDEX public.product_pricelist_item_compute_price_index;

CREATE INDEX product_pricelist_item_compute_price_index
    ON public.product_pricelist_item USING btree
    (compute_price COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: product_pricelist_item_pricelist_id_index

-- DROP INDEX public.product_pricelist_item_pricelist_id_index;

CREATE INDEX product_pricelist_item_pricelist_id_index
    ON public.product_pricelist_item USING btree
    (pricelist_id ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.product_product

-- DROP TABLE public.product_product;

CREATE TABLE IF NOT EXISTS public.product_product
(
    id integer NOT NULL DEFAULT nextval('product_product_id_seq'::regclass),
    message_main_attachment_id integer,
    default_code character varying COLLATE pg_catalog."default",
    active boolean,
    product_tmpl_id integer NOT NULL,
    barcode character varying COLLATE pg_catalog."default",
    combination_indices character varying COLLATE pg_catalog."default",
    volume numeric,
    weight numeric,
    can_image_variant_1024_be_zoomed boolean,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT product_product_pkey PRIMARY KEY (id),
    CONSTRAINT product_product_barcode_uniq UNIQUE (barcode),
    CONSTRAINT product_product_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT product_product_message_main_attachment_id_fkey FOREIGN KEY (message_main_attachment_id)
        REFERENCES public.ir_attachment (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT product_product_product_tmpl_id_fkey FOREIGN KEY (product_tmpl_id)
        REFERENCES public.product_template (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT product_product_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.product_product
    OWNER to flectra;

COMMENT ON TABLE public.product_product
    IS 'Product';

COMMENT ON COLUMN public.product_product.message_main_attachment_id
    IS 'Main Attachment';

COMMENT ON COLUMN public.product_product.default_code
    IS 'Internal Reference';

COMMENT ON COLUMN public.product_product.active
    IS 'Active';

COMMENT ON COLUMN public.product_product.product_tmpl_id
    IS 'Product Template';

COMMENT ON COLUMN public.product_product.barcode
    IS 'Barcode';

COMMENT ON COLUMN public.product_product.combination_indices
    IS 'Combination Indices';

COMMENT ON COLUMN public.product_product.volume
    IS 'Volume';

COMMENT ON COLUMN public.product_product.weight
    IS 'Weight';

COMMENT ON COLUMN public.product_product.can_image_variant_1024_be_zoomed
    IS 'Can Variant Image 1024 be zoomed';

COMMENT ON COLUMN public.product_product.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.product_product.create_date
    IS 'Created on';

COMMENT ON COLUMN public.product_product.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.product_product.write_date
    IS 'Last Updated on';

COMMENT ON CONSTRAINT product_product_barcode_uniq ON public.product_product
    IS 'unique(barcode)';
-- Index: product_product_combination_indices_index

-- DROP INDEX public.product_product_combination_indices_index;

CREATE INDEX product_product_combination_indices_index
    ON public.product_product USING btree
    (combination_indices COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: product_product_combination_unique

-- DROP INDEX public.product_product_combination_unique;

CREATE UNIQUE INDEX product_product_combination_unique
    ON public.product_product USING btree
    (product_tmpl_id ASC NULLS LAST, combination_indices COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default
    WHERE active IS TRUE;
-- Index: product_product_default_code_index

-- DROP INDEX public.product_product_default_code_index;

CREATE INDEX product_product_default_code_index
    ON public.product_product USING btree
    (default_code COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: product_product_message_main_attachment_id_index

-- DROP INDEX public.product_product_message_main_attachment_id_index;

CREATE INDEX product_product_message_main_attachment_id_index
    ON public.product_product USING btree
    (message_main_attachment_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: product_product_product_tmpl_id_index

-- DROP INDEX public.product_product_product_tmpl_id_index;

CREATE INDEX product_product_product_tmpl_id_index
    ON public.product_product USING btree
    (product_tmpl_id ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.purchase_order

-- DROP TABLE public.purchase_order;

CREATE TABLE IF NOT EXISTS public.purchase_order
(
    id integer NOT NULL DEFAULT nextval('purchase_order_id_seq'::regclass),
    access_token character varying COLLATE pg_catalog."default",
    message_main_attachment_id integer,
    name character varying COLLATE pg_catalog."default" NOT NULL,
    priority character varying COLLATE pg_catalog."default",
    origin character varying COLLATE pg_catalog."default",
    partner_ref character varying COLLATE pg_catalog."default",
    date_order timestamp without time zone NOT NULL,
    date_approve timestamp without time zone,
    partner_id integer NOT NULL,
    dest_address_id integer,
    currency_id integer NOT NULL,
    state character varying COLLATE pg_catalog."default",
    notes text COLLATE pg_catalog."default",
    invoice_count integer,
    invoice_status character varying COLLATE pg_catalog."default",
    date_planned timestamp without time zone,
    date_calendar_start timestamp without time zone,
    amount_untaxed numeric,
    amount_tax numeric,
    amount_total numeric,
    fiscal_position_id integer,
    payment_term_id integer,
    incoterm_id integer,
    user_id integer,
    company_id integer NOT NULL,
    currency_rate double precision,
    mail_reminder_confirmed boolean,
    mail_reception_confirmed boolean,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    picking_count integer,
    picking_type_id integer NOT NULL,
    group_id integer,
    effective_date timestamp without time zone,
    CONSTRAINT purchase_order_pkey PRIMARY KEY (id),
    CONSTRAINT purchase_order_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT purchase_order_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_currency_id_fkey FOREIGN KEY (currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT purchase_order_dest_address_id_fkey FOREIGN KEY (dest_address_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_fiscal_position_id_fkey FOREIGN KEY (fiscal_position_id)
        REFERENCES public.account_fiscal_position (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_group_id_fkey FOREIGN KEY (group_id)
        REFERENCES public.procurement_group (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_incoterm_id_fkey FOREIGN KEY (incoterm_id)
        REFERENCES public.account_incoterms (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_message_main_attachment_id_fkey FOREIGN KEY (message_main_attachment_id)
        REFERENCES public.ir_attachment (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_partner_id_fkey FOREIGN KEY (partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT purchase_order_payment_term_id_fkey FOREIGN KEY (payment_term_id)
        REFERENCES public.account_payment_term (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_picking_type_id_fkey FOREIGN KEY (picking_type_id)
        REFERENCES public.stock_picking_type (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT purchase_order_user_id_fkey FOREIGN KEY (user_id)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.purchase_order
    OWNER to flectra;

COMMENT ON TABLE public.purchase_order
    IS 'Purchase Order';

COMMENT ON COLUMN public.purchase_order.access_token
    IS 'Security Token';

COMMENT ON COLUMN public.purchase_order.message_main_attachment_id
    IS 'Main Attachment';

COMMENT ON COLUMN public.purchase_order.name
    IS 'Order Reference';

COMMENT ON COLUMN public.purchase_order.priority
    IS 'Priority';

COMMENT ON COLUMN public.purchase_order.origin
    IS 'Source Document';

COMMENT ON COLUMN public.purchase_order.partner_ref
    IS 'Vendor Reference';

COMMENT ON COLUMN public.purchase_order.date_order
    IS 'Order Deadline';

COMMENT ON COLUMN public.purchase_order.date_approve
    IS 'Confirmation Date';

COMMENT ON COLUMN public.purchase_order.partner_id
    IS 'Vendor';

COMMENT ON COLUMN public.purchase_order.dest_address_id
    IS 'Drop Ship Address';

COMMENT ON COLUMN public.purchase_order.currency_id
    IS 'Currency';

COMMENT ON COLUMN public.purchase_order.state
    IS 'Status';

COMMENT ON COLUMN public.purchase_order.notes
    IS 'Terms and Conditions';

COMMENT ON COLUMN public.purchase_order.invoice_count
    IS 'Bill Count';

COMMENT ON COLUMN public.purchase_order.invoice_status
    IS 'Billing Status';

COMMENT ON COLUMN public.purchase_order.date_planned
    IS 'Receipt Date';

COMMENT ON COLUMN public.purchase_order.date_calendar_start
    IS 'Date Calendar Start';

COMMENT ON COLUMN public.purchase_order.amount_untaxed
    IS 'Untaxed Amount';

COMMENT ON COLUMN public.purchase_order.amount_tax
    IS 'Taxes';

COMMENT ON COLUMN public.purchase_order.amount_total
    IS 'Total';

COMMENT ON COLUMN public.purchase_order.fiscal_position_id
    IS 'Fiscal Position';

COMMENT ON COLUMN public.purchase_order.payment_term_id
    IS 'Payment Terms';

COMMENT ON COLUMN public.purchase_order.incoterm_id
    IS 'Incoterm';

COMMENT ON COLUMN public.purchase_order.user_id
    IS 'Purchase Representative';

COMMENT ON COLUMN public.purchase_order.company_id
    IS 'Company';

COMMENT ON COLUMN public.purchase_order.currency_rate
    IS 'Currency Rate';

COMMENT ON COLUMN public.purchase_order.mail_reminder_confirmed
    IS 'Reminder Confirmed';

COMMENT ON COLUMN public.purchase_order.mail_reception_confirmed
    IS 'Reception Confirmed';

COMMENT ON COLUMN public.purchase_order.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.purchase_order.create_date
    IS 'Created on';

COMMENT ON COLUMN public.purchase_order.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.purchase_order.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.purchase_order.picking_count
    IS 'Picking count';

COMMENT ON COLUMN public.purchase_order.picking_type_id
    IS 'Deliver To';

COMMENT ON COLUMN public.purchase_order.group_id
    IS 'Procurement Group';

COMMENT ON COLUMN public.purchase_order.effective_date
    IS 'Effective Date';
-- Index: purchase_order_company_id_index

-- DROP INDEX public.purchase_order_company_id_index;

CREATE INDEX purchase_order_company_id_index
    ON public.purchase_order USING btree
    (company_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: purchase_order_date_approve_index

-- DROP INDEX public.purchase_order_date_approve_index;

CREATE INDEX purchase_order_date_approve_index
    ON public.purchase_order USING btree
    (date_approve ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: purchase_order_date_order_index

-- DROP INDEX public.purchase_order_date_order_index;

CREATE INDEX purchase_order_date_order_index
    ON public.purchase_order USING btree
    (date_order ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: purchase_order_date_planned_index

-- DROP INDEX public.purchase_order_date_planned_index;

CREATE INDEX purchase_order_date_planned_index
    ON public.purchase_order USING btree
    (date_planned ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: purchase_order_message_main_attachment_id_index

-- DROP INDEX public.purchase_order_message_main_attachment_id_index;

CREATE INDEX purchase_order_message_main_attachment_id_index
    ON public.purchase_order USING btree
    (message_main_attachment_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: purchase_order_name_index

-- DROP INDEX public.purchase_order_name_index;

CREATE INDEX purchase_order_name_index
    ON public.purchase_order USING btree
    (name COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: purchase_order_priority_index

-- DROP INDEX public.purchase_order_priority_index;

CREATE INDEX purchase_order_priority_index
    ON public.purchase_order USING btree
    (priority COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: purchase_order_state_index

-- DROP INDEX public.purchase_order_state_index;

CREATE INDEX purchase_order_state_index
    ON public.purchase_order USING btree
    (state COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: purchase_order_user_id_index

-- DROP INDEX public.purchase_order_user_id_index;

CREATE INDEX purchase_order_user_id_index
    ON public.purchase_order USING btree
    (user_id ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.purchase_order_line

-- DROP TABLE public.purchase_order_line;

CREATE TABLE IF NOT EXISTS public.purchase_order_line
(
    id integer NOT NULL DEFAULT nextval('purchase_order_line_id_seq'::regclass),
    name text COLLATE pg_catalog."default" NOT NULL,
    sequence integer,
    product_qty numeric NOT NULL,
    product_uom_qty double precision,
    date_planned timestamp without time zone,
    product_uom integer,
    product_id integer,
    price_unit numeric NOT NULL,
    price_subtotal numeric,
    price_total numeric,
    price_tax double precision,
    order_id integer NOT NULL,
    account_analytic_id integer,
    company_id integer,
    state character varying COLLATE pg_catalog."default",
    qty_invoiced numeric,
    qty_received_method character varying COLLATE pg_catalog."default",
    qty_received numeric,
    qty_received_manual numeric,
    qty_to_invoice numeric,
    partner_id integer,
    currency_id integer,
    display_type character varying COLLATE pg_catalog."default",
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    orderpoint_id integer,
    product_description_variants character varying COLLATE pg_catalog."default",
    propagate_cancel boolean,
    CONSTRAINT purchase_order_line_pkey PRIMARY KEY (id),
    CONSTRAINT purchase_order_line_account_analytic_id_fkey FOREIGN KEY (account_analytic_id)
        REFERENCES public.account_analytic_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_line_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_line_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_line_currency_id_fkey FOREIGN KEY (currency_id)
        REFERENCES public.res_currency (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_line_order_id_fkey FOREIGN KEY (order_id)
        REFERENCES public.purchase_order (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT purchase_order_line_orderpoint_id_fkey FOREIGN KEY (orderpoint_id)
        REFERENCES public.stock_warehouse_orderpoint (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_line_partner_id_fkey FOREIGN KEY (partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_line_product_id_fkey FOREIGN KEY (product_id)
        REFERENCES public.product_product (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_line_product_uom_fkey FOREIGN KEY (product_uom)
        REFERENCES public.uom_uom (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_line_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT purchase_order_line_accountable_required_fields CHECK (display_type IS NOT NULL OR product_id IS NOT NULL AND product_uom IS NOT NULL AND date_planned IS NOT NULL),
    CONSTRAINT purchase_order_line_non_accountable_null_fields CHECK (display_type IS NULL OR product_id IS NULL AND price_unit = 0::numeric AND product_uom_qty = 0::double precision AND product_uom IS NULL AND date_planned IS NULL)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.purchase_order_line
    OWNER to flectra;

COMMENT ON TABLE public.purchase_order_line
    IS 'Purchase Order Line';

COMMENT ON COLUMN public.purchase_order_line.name
    IS 'Description';

COMMENT ON COLUMN public.purchase_order_line.sequence
    IS 'Sequence';

COMMENT ON COLUMN public.purchase_order_line.product_qty
    IS 'Quantity';

COMMENT ON COLUMN public.purchase_order_line.product_uom_qty
    IS 'Total Quantity';

COMMENT ON COLUMN public.purchase_order_line.date_planned
    IS 'Delivery Date';

COMMENT ON COLUMN public.purchase_order_line.product_uom
    IS 'Unit of Measure';

COMMENT ON COLUMN public.purchase_order_line.product_id
    IS 'Product';

COMMENT ON COLUMN public.purchase_order_line.price_unit
    IS 'Unit Price';

COMMENT ON COLUMN public.purchase_order_line.price_subtotal
    IS 'Subtotal';

COMMENT ON COLUMN public.purchase_order_line.price_total
    IS 'Total';

COMMENT ON COLUMN public.purchase_order_line.price_tax
    IS 'Tax';

COMMENT ON COLUMN public.purchase_order_line.order_id
    IS 'Order Reference';

COMMENT ON COLUMN public.purchase_order_line.account_analytic_id
    IS 'Analytic Account';

COMMENT ON COLUMN public.purchase_order_line.company_id
    IS 'Company';

COMMENT ON COLUMN public.purchase_order_line.state
    IS 'Status';

COMMENT ON COLUMN public.purchase_order_line.qty_invoiced
    IS 'Billed Qty';

COMMENT ON COLUMN public.purchase_order_line.qty_received_method
    IS 'Received Qty Method';

COMMENT ON COLUMN public.purchase_order_line.qty_received
    IS 'Received Qty';

COMMENT ON COLUMN public.purchase_order_line.qty_received_manual
    IS 'Manual Received Qty';

COMMENT ON COLUMN public.purchase_order_line.qty_to_invoice
    IS 'To Invoice Quantity';

COMMENT ON COLUMN public.purchase_order_line.partner_id
    IS 'Partner';

COMMENT ON COLUMN public.purchase_order_line.currency_id
    IS 'Currency';

COMMENT ON COLUMN public.purchase_order_line.display_type
    IS 'Display Type';

COMMENT ON COLUMN public.purchase_order_line.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.purchase_order_line.create_date
    IS 'Created on';

COMMENT ON COLUMN public.purchase_order_line.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.purchase_order_line.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.purchase_order_line.orderpoint_id
    IS 'Orderpoint';

COMMENT ON COLUMN public.purchase_order_line.product_description_variants
    IS 'Custom Description';

COMMENT ON COLUMN public.purchase_order_line.propagate_cancel
    IS 'Propagate cancellation';

COMMENT ON CONSTRAINT purchase_order_line_accountable_required_fields ON public.purchase_order_line
    IS 'CHECK(display_type IS NOT NULL OR (product_id IS NOT NULL AND product_uom IS NOT NULL AND date_planned IS NOT NULL))';
COMMENT ON CONSTRAINT purchase_order_line_non_accountable_null_fields ON public.purchase_order_line
    IS 'CHECK(display_type IS NULL OR (product_id IS NULL AND price_unit = 0 AND product_uom_qty = 0 AND product_uom IS NULL AND date_planned is NULL))';
-- Index: purchase_order_line_date_planned_index

-- DROP INDEX public.purchase_order_line_date_planned_index;

CREATE INDEX purchase_order_line_date_planned_index
    ON public.purchase_order_line USING btree
    (date_planned ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: purchase_order_line_order_id_index

-- DROP INDEX public.purchase_order_line_order_id_index;

CREATE INDEX purchase_order_line_order_id_index
    ON public.purchase_order_line USING btree
    (order_id ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.stock_inventory

-- DROP TABLE public.stock_inventory;

CREATE TABLE IF NOT EXISTS public.stock_inventory
(
    id integer NOT NULL DEFAULT nextval('stock_inventory_id_seq'::regclass),
    message_main_attachment_id integer,
    name character varying COLLATE pg_catalog."default" NOT NULL,
    date timestamp without time zone NOT NULL,
    state character varying COLLATE pg_catalog."default",
    company_id integer NOT NULL,
    start_empty boolean,
    prefill_counted_quantity character varying COLLATE pg_catalog."default",
    exhausted boolean,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    accounting_date date,
    CONSTRAINT stock_inventory_pkey PRIMARY KEY (id),
    CONSTRAINT stock_inventory_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_inventory_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_inventory_message_main_attachment_id_fkey FOREIGN KEY (message_main_attachment_id)
        REFERENCES public.ir_attachment (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_inventory_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.stock_inventory
    OWNER to flectra;

COMMENT ON TABLE public.stock_inventory
    IS 'Inventory';

COMMENT ON COLUMN public.stock_inventory.message_main_attachment_id
    IS 'Main Attachment';

COMMENT ON COLUMN public.stock_inventory.name
    IS 'Inventory Reference';

COMMENT ON COLUMN public.stock_inventory.date
    IS 'Inventory Date';

COMMENT ON COLUMN public.stock_inventory.state
    IS 'Status';

COMMENT ON COLUMN public.stock_inventory.company_id
    IS 'Company';

COMMENT ON COLUMN public.stock_inventory.start_empty
    IS 'Empty Inventory';

COMMENT ON COLUMN public.stock_inventory.prefill_counted_quantity
    IS 'Counted Quantities';

COMMENT ON COLUMN public.stock_inventory.exhausted
    IS 'Include Exhausted Products';

COMMENT ON COLUMN public.stock_inventory.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.stock_inventory.create_date
    IS 'Created on';

COMMENT ON COLUMN public.stock_inventory.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.stock_inventory.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.stock_inventory.accounting_date
    IS 'Accounting Date';
-- Index: stock_inventory_company_id_index

-- DROP INDEX public.stock_inventory_company_id_index;

CREATE INDEX stock_inventory_company_id_index
    ON public.stock_inventory USING btree
    (company_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_inventory_message_main_attachment_id_index

-- DROP INDEX public.stock_inventory_message_main_attachment_id_index;

CREATE INDEX stock_inventory_message_main_attachment_id_index
    ON public.stock_inventory USING btree
    (message_main_attachment_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_inventory_state_index

-- DROP INDEX public.stock_inventory_state_index;

CREATE INDEX stock_inventory_state_index
    ON public.stock_inventory USING btree
    (state COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.stock_inventory_line

-- DROP TABLE public.stock_inventory_line;

CREATE TABLE IF NOT EXISTS public.stock_inventory_line
(
    id integer NOT NULL DEFAULT nextval('stock_inventory_line_id_seq'::regclass),
    is_editable boolean,
    inventory_id integer,
    partner_id integer,
    product_id integer NOT NULL,
    product_uom_id integer NOT NULL,
    product_qty numeric,
    categ_id integer,
    location_id integer NOT NULL,
    package_id integer,
    prod_lot_id integer,
    company_id integer,
    theoretical_qty numeric,
    inventory_date timestamp without time zone,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT stock_inventory_line_pkey PRIMARY KEY (id),
    CONSTRAINT stock_inventory_line_categ_id_fkey FOREIGN KEY (categ_id)
        REFERENCES public.product_category (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_inventory_line_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_inventory_line_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_inventory_line_inventory_id_fkey FOREIGN KEY (inventory_id)
        REFERENCES public.stock_inventory (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT stock_inventory_line_location_id_fkey FOREIGN KEY (location_id)
        REFERENCES public.stock_location (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_inventory_line_package_id_fkey FOREIGN KEY (package_id)
        REFERENCES public.stock_quant_package (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_inventory_line_partner_id_fkey FOREIGN KEY (partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_inventory_line_prod_lot_id_fkey FOREIGN KEY (prod_lot_id)
        REFERENCES public.stock_production_lot (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_inventory_line_product_id_fkey FOREIGN KEY (product_id)
        REFERENCES public.product_product (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_inventory_line_product_uom_id_fkey FOREIGN KEY (product_uom_id)
        REFERENCES public.uom_uom (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_inventory_line_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.stock_inventory_line
    OWNER to flectra;

COMMENT ON TABLE public.stock_inventory_line
    IS 'Inventory Line';

COMMENT ON COLUMN public.stock_inventory_line.is_editable
    IS 'Is Editable';

COMMENT ON COLUMN public.stock_inventory_line.inventory_id
    IS 'Inventory';

COMMENT ON COLUMN public.stock_inventory_line.partner_id
    IS 'Owner';

COMMENT ON COLUMN public.stock_inventory_line.product_id
    IS 'Product';

COMMENT ON COLUMN public.stock_inventory_line.product_uom_id
    IS 'Product Unit of Measure';

COMMENT ON COLUMN public.stock_inventory_line.product_qty
    IS 'Counted Quantity';

COMMENT ON COLUMN public.stock_inventory_line.categ_id
    IS 'Product Category';

COMMENT ON COLUMN public.stock_inventory_line.location_id
    IS 'Location';

COMMENT ON COLUMN public.stock_inventory_line.package_id
    IS 'Pack';

COMMENT ON COLUMN public.stock_inventory_line.prod_lot_id
    IS 'Lot/Serial Number';

COMMENT ON COLUMN public.stock_inventory_line.company_id
    IS 'Company';

COMMENT ON COLUMN public.stock_inventory_line.theoretical_qty
    IS 'Theoretical Quantity';

COMMENT ON COLUMN public.stock_inventory_line.inventory_date
    IS 'Inventory Date';

COMMENT ON COLUMN public.stock_inventory_line.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.stock_inventory_line.create_date
    IS 'Created on';

COMMENT ON COLUMN public.stock_inventory_line.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.stock_inventory_line.write_date
    IS 'Last Updated on';
-- Index: stock_inventory_line_company_id_index

-- DROP INDEX public.stock_inventory_line_company_id_index;

CREATE INDEX stock_inventory_line_company_id_index
    ON public.stock_inventory_line USING btree
    (company_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_inventory_line_inventory_id_index

-- DROP INDEX public.stock_inventory_line_inventory_id_index;

CREATE INDEX stock_inventory_line_inventory_id_index
    ON public.stock_inventory_line USING btree
    (inventory_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_inventory_line_location_id_index

-- DROP INDEX public.stock_inventory_line_location_id_index;

CREATE INDEX stock_inventory_line_location_id_index
    ON public.stock_inventory_line USING btree
    (location_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_inventory_line_package_id_index

-- DROP INDEX public.stock_inventory_line_package_id_index;

CREATE INDEX stock_inventory_line_package_id_index
    ON public.stock_inventory_line USING btree
    (package_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_inventory_line_product_id_index

-- DROP INDEX public.stock_inventory_line_product_id_index;

CREATE INDEX stock_inventory_line_product_id_index
    ON public.stock_inventory_line USING btree
    (product_id ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.stock_location

-- DROP TABLE public.stock_location;

CREATE TABLE IF NOT EXISTS public.stock_location
(
    id integer NOT NULL DEFAULT nextval('stock_location_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    complete_name character varying COLLATE pg_catalog."default",
    active boolean,
    usage character varying COLLATE pg_catalog."default" NOT NULL,
    location_id integer,
    comment text COLLATE pg_catalog."default",
    posx integer,
    posy integer,
    posz integer,
    parent_path character varying COLLATE pg_catalog."default",
    company_id integer,
    scrap_location boolean,
    return_location boolean,
    removal_strategy_id integer,
    barcode character varying COLLATE pg_catalog."default",
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    valuation_in_account_id integer,
    valuation_out_account_id integer,
    CONSTRAINT stock_location_pkey PRIMARY KEY (id),
    CONSTRAINT stock_location_barcode_company_uniq UNIQUE (barcode, company_id),
    CONSTRAINT stock_location_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_location_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_location_location_id_fkey FOREIGN KEY (location_id)
        REFERENCES public.stock_location (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT stock_location_removal_strategy_id_fkey FOREIGN KEY (removal_strategy_id)
        REFERENCES public.product_removal (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_location_valuation_in_account_id_fkey FOREIGN KEY (valuation_in_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_location_valuation_out_account_id_fkey FOREIGN KEY (valuation_out_account_id)
        REFERENCES public.account_account (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_location_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.stock_location
    OWNER to flectra;

COMMENT ON TABLE public.stock_location
    IS 'Inventory Locations';

COMMENT ON COLUMN public.stock_location.name
    IS 'Location Name';

COMMENT ON COLUMN public.stock_location.complete_name
    IS 'Full Location Name';

COMMENT ON COLUMN public.stock_location.active
    IS 'Active';

COMMENT ON COLUMN public.stock_location.usage
    IS 'Location Type';

COMMENT ON COLUMN public.stock_location.location_id
    IS 'Parent Location';

COMMENT ON COLUMN public.stock_location.comment
    IS 'Additional Information';

COMMENT ON COLUMN public.stock_location.posx
    IS 'Corridor (X)';

COMMENT ON COLUMN public.stock_location.posy
    IS 'Shelves (Y)';

COMMENT ON COLUMN public.stock_location.posz
    IS 'Height (Z)';

COMMENT ON COLUMN public.stock_location.parent_path
    IS 'Parent Path';

COMMENT ON COLUMN public.stock_location.company_id
    IS 'Company';

COMMENT ON COLUMN public.stock_location.scrap_location
    IS 'Is a Scrap Location?';

COMMENT ON COLUMN public.stock_location.return_location
    IS 'Is a Return Location?';

COMMENT ON COLUMN public.stock_location.removal_strategy_id
    IS 'Removal Strategy';

COMMENT ON COLUMN public.stock_location.barcode
    IS 'Barcode';

COMMENT ON COLUMN public.stock_location.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.stock_location.create_date
    IS 'Created on';

COMMENT ON COLUMN public.stock_location.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.stock_location.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.stock_location.valuation_in_account_id
    IS 'Stock Valuation Account (Incoming)';

COMMENT ON COLUMN public.stock_location.valuation_out_account_id
    IS 'Stock Valuation Account (Outgoing)';

COMMENT ON CONSTRAINT stock_location_barcode_company_uniq ON public.stock_location
    IS 'unique (barcode,company_id)';
-- Index: stock_location_company_id_index

-- DROP INDEX public.stock_location_company_id_index;

CREATE INDEX stock_location_company_id_index
    ON public.stock_location USING btree
    (company_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_location_location_id_index

-- DROP INDEX public.stock_location_location_id_index;

CREATE INDEX stock_location_location_id_index
    ON public.stock_location USING btree
    (location_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_location_parent_path_index

-- DROP INDEX public.stock_location_parent_path_index;

CREATE INDEX stock_location_parent_path_index
    ON public.stock_location USING btree
    (parent_path COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_location_usage_index

-- DROP INDEX public.stock_location_usage_index;

CREATE INDEX stock_location_usage_index
    ON public.stock_location USING btree
    (usage COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.stock_move

-- DROP TABLE public.stock_move;

CREATE TABLE IF NOT EXISTS public.stock_move
(
    id integer NOT NULL DEFAULT nextval('stock_move_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    sequence integer,
    priority character varying COLLATE pg_catalog."default",
    create_date timestamp without time zone,
    date timestamp without time zone NOT NULL,
    date_deadline timestamp without time zone,
    company_id integer NOT NULL,
    product_id integer NOT NULL,
    description_picking text COLLATE pg_catalog."default",
    product_qty numeric,
    product_uom_qty numeric NOT NULL,
    product_uom integer NOT NULL,
    location_id integer NOT NULL,
    location_dest_id integer NOT NULL,
    partner_id integer,
    picking_id integer,
    note text COLLATE pg_catalog."default",
    state character varying COLLATE pg_catalog."default",
    price_unit double precision,
    origin character varying COLLATE pg_catalog."default",
    procure_method character varying COLLATE pg_catalog."default" NOT NULL,
    scrapped boolean,
    group_id integer,
    rule_id integer,
    propagate_cancel boolean,
    delay_alert_date timestamp without time zone,
    picking_type_id integer,
    inventory_id integer,
    origin_returned_move_id integer,
    restrict_partner_id integer,
    warehouse_id integer,
    additional boolean,
    reference character varying COLLATE pg_catalog."default",
    package_level_id integer,
    next_serial character varying COLLATE pg_catalog."default",
    next_serial_count integer,
    orderpoint_id integer,
    create_uid integer,
    write_uid integer,
    write_date timestamp without time zone,
    to_refund boolean,
    purchase_line_id integer,
    created_purchase_line_id integer,
    CONSTRAINT stock_move_pkey PRIMARY KEY (id),
    CONSTRAINT stock_move_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_created_purchase_line_id_fkey FOREIGN KEY (created_purchase_line_id)
        REFERENCES public.purchase_order_line (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_group_id_fkey FOREIGN KEY (group_id)
        REFERENCES public.procurement_group (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_inventory_id_fkey FOREIGN KEY (inventory_id)
        REFERENCES public.stock_inventory (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_location_dest_id_fkey FOREIGN KEY (location_dest_id)
        REFERENCES public.stock_location (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_location_id_fkey FOREIGN KEY (location_id)
        REFERENCES public.stock_location (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_orderpoint_id_fkey FOREIGN KEY (orderpoint_id)
        REFERENCES public.stock_warehouse_orderpoint (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_origin_returned_move_id_fkey FOREIGN KEY (origin_returned_move_id)
        REFERENCES public.stock_move (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_package_level_id_fkey FOREIGN KEY (package_level_id)
        REFERENCES public.stock_package_level (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_partner_id_fkey FOREIGN KEY (partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_picking_id_fkey FOREIGN KEY (picking_id)
        REFERENCES public.stock_picking (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_picking_type_id_fkey FOREIGN KEY (picking_type_id)
        REFERENCES public.stock_picking_type (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_product_id_fkey FOREIGN KEY (product_id)
        REFERENCES public.product_product (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_product_uom_fkey FOREIGN KEY (product_uom)
        REFERENCES public.uom_uom (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_purchase_line_id_fkey FOREIGN KEY (purchase_line_id)
        REFERENCES public.purchase_order_line (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_restrict_partner_id_fkey FOREIGN KEY (restrict_partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_rule_id_fkey FOREIGN KEY (rule_id)
        REFERENCES public.stock_rule (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_warehouse_id_fkey FOREIGN KEY (warehouse_id)
        REFERENCES public.stock_warehouse (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.stock_move
    OWNER to flectra;

COMMENT ON TABLE public.stock_move
    IS 'Stock Move';

COMMENT ON COLUMN public.stock_move.name
    IS 'Description';

COMMENT ON COLUMN public.stock_move.sequence
    IS 'Sequence';

COMMENT ON COLUMN public.stock_move.priority
    IS 'Priority';

COMMENT ON COLUMN public.stock_move.create_date
    IS 'Creation Date';

COMMENT ON COLUMN public.stock_move.date
    IS 'Date Scheduled';

COMMENT ON COLUMN public.stock_move.date_deadline
    IS 'Deadline';

COMMENT ON COLUMN public.stock_move.company_id
    IS 'Company';

COMMENT ON COLUMN public.stock_move.product_id
    IS 'Product';

COMMENT ON COLUMN public.stock_move.description_picking
    IS 'Description of Picking';

COMMENT ON COLUMN public.stock_move.product_qty
    IS 'Real Quantity';

COMMENT ON COLUMN public.stock_move.product_uom_qty
    IS 'Demand';

COMMENT ON COLUMN public.stock_move.product_uom
    IS 'Unit of Measure';

COMMENT ON COLUMN public.stock_move.location_id
    IS 'Source Location';

COMMENT ON COLUMN public.stock_move.location_dest_id
    IS 'Destination Location';

COMMENT ON COLUMN public.stock_move.partner_id
    IS 'Destination Address ';

COMMENT ON COLUMN public.stock_move.picking_id
    IS 'Transfer';

COMMENT ON COLUMN public.stock_move.note
    IS 'Notes';

COMMENT ON COLUMN public.stock_move.state
    IS 'Status';

COMMENT ON COLUMN public.stock_move.price_unit
    IS 'Unit Price';

COMMENT ON COLUMN public.stock_move.origin
    IS 'Source Document';

COMMENT ON COLUMN public.stock_move.procure_method
    IS 'Supply Method';

COMMENT ON COLUMN public.stock_move.scrapped
    IS 'Scrapped';

COMMENT ON COLUMN public.stock_move.group_id
    IS 'Procurement Group';

COMMENT ON COLUMN public.stock_move.rule_id
    IS 'Stock Rule';

COMMENT ON COLUMN public.stock_move.propagate_cancel
    IS 'Propagate cancel and split';

COMMENT ON COLUMN public.stock_move.delay_alert_date
    IS 'Delay Alert Date';

COMMENT ON COLUMN public.stock_move.picking_type_id
    IS 'Operation Type';

COMMENT ON COLUMN public.stock_move.inventory_id
    IS 'Inventory';

COMMENT ON COLUMN public.stock_move.origin_returned_move_id
    IS 'Origin return move';

COMMENT ON COLUMN public.stock_move.restrict_partner_id
    IS 'Owner ';

COMMENT ON COLUMN public.stock_move.warehouse_id
    IS 'Warehouse';

COMMENT ON COLUMN public.stock_move.additional
    IS 'Whether the move was added after the picking''s confirmation';

COMMENT ON COLUMN public.stock_move.reference
    IS 'Reference';

COMMENT ON COLUMN public.stock_move.package_level_id
    IS 'Package Level';

COMMENT ON COLUMN public.stock_move.next_serial
    IS 'First SN';

COMMENT ON COLUMN public.stock_move.next_serial_count
    IS 'Number of SN';

COMMENT ON COLUMN public.stock_move.orderpoint_id
    IS 'Original Reordering Rule';

COMMENT ON COLUMN public.stock_move.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.stock_move.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.stock_move.write_date
    IS 'Last Updated on';

COMMENT ON COLUMN public.stock_move.to_refund
    IS 'Update quantities on SO/PO';

COMMENT ON COLUMN public.stock_move.purchase_line_id
    IS 'Purchase Order Line';

COMMENT ON COLUMN public.stock_move.created_purchase_line_id
    IS 'Created Purchase Order Line';
-- Index: stock_move_company_id_index

-- DROP INDEX public.stock_move_company_id_index;

CREATE INDEX stock_move_company_id_index
    ON public.stock_move USING btree
    (company_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_create_date_index

-- DROP INDEX public.stock_move_create_date_index;

CREATE INDEX stock_move_create_date_index
    ON public.stock_move USING btree
    (create_date ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_date_index

-- DROP INDEX public.stock_move_date_index;

CREATE INDEX stock_move_date_index
    ON public.stock_move USING btree
    (date ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_location_dest_id_index

-- DROP INDEX public.stock_move_location_dest_id_index;

CREATE INDEX stock_move_location_dest_id_index
    ON public.stock_move USING btree
    (location_dest_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_location_id_index

-- DROP INDEX public.stock_move_location_id_index;

CREATE INDEX stock_move_location_id_index
    ON public.stock_move USING btree
    (location_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_name_index

-- DROP INDEX public.stock_move_name_index;

CREATE INDEX stock_move_name_index
    ON public.stock_move USING btree
    (name COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_origin_returned_move_id_index

-- DROP INDEX public.stock_move_origin_returned_move_id_index;

CREATE INDEX stock_move_origin_returned_move_id_index
    ON public.stock_move USING btree
    (origin_returned_move_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_picking_id_index

-- DROP INDEX public.stock_move_picking_id_index;

CREATE INDEX stock_move_picking_id_index
    ON public.stock_move USING btree
    (picking_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_priority_index

-- DROP INDEX public.stock_move_priority_index;

CREATE INDEX stock_move_priority_index
    ON public.stock_move USING btree
    (priority COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_product_id_index

-- DROP INDEX public.stock_move_product_id_index;

CREATE INDEX stock_move_product_id_index
    ON public.stock_move USING btree
    (product_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_product_location_index

-- DROP INDEX public.stock_move_product_location_index;

CREATE INDEX stock_move_product_location_index
    ON public.stock_move USING btree
    (product_id ASC NULLS LAST, location_id ASC NULLS LAST, location_dest_id ASC NULLS LAST, company_id ASC NULLS LAST, state COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_purchase_line_id_index

-- DROP INDEX public.stock_move_purchase_line_id_index;

CREATE INDEX stock_move_purchase_line_id_index
    ON public.stock_move USING btree
    (purchase_line_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_state_index

-- DROP INDEX public.stock_move_state_index;

CREATE INDEX stock_move_state_index
    ON public.stock_move USING btree
    (state COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.stock_move_line

-- DROP TABLE public.stock_move_line;

CREATE TABLE IF NOT EXISTS public.stock_move_line
(
    id integer NOT NULL DEFAULT nextval('stock_move_line_id_seq'::regclass),
    picking_id integer,
    move_id integer,
    company_id integer NOT NULL,
    product_id integer,
    product_uom_id integer NOT NULL,
    product_qty numeric,
    product_uom_qty numeric NOT NULL,
    qty_done numeric,
    package_id integer,
    package_level_id integer,
    lot_id integer,
    lot_name character varying COLLATE pg_catalog."default",
    result_package_id integer,
    date timestamp without time zone NOT NULL,
    owner_id integer,
    location_id integer NOT NULL,
    location_dest_id integer NOT NULL,
    state character varying COLLATE pg_catalog."default",
    reference character varying COLLATE pg_catalog."default",
    description_picking text COLLATE pg_catalog."default",
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT stock_move_line_pkey PRIMARY KEY (id),
    CONSTRAINT stock_move_line_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_line_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_line_location_dest_id_fkey FOREIGN KEY (location_dest_id)
        REFERENCES public.stock_location (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_line_location_id_fkey FOREIGN KEY (location_id)
        REFERENCES public.stock_location (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_line_lot_id_fkey FOREIGN KEY (lot_id)
        REFERENCES public.stock_production_lot (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_line_move_id_fkey FOREIGN KEY (move_id)
        REFERENCES public.stock_move (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_line_owner_id_fkey FOREIGN KEY (owner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_line_package_id_fkey FOREIGN KEY (package_id)
        REFERENCES public.stock_quant_package (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_line_package_level_id_fkey FOREIGN KEY (package_level_id)
        REFERENCES public.stock_package_level (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_line_picking_id_fkey FOREIGN KEY (picking_id)
        REFERENCES public.stock_picking (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_move_line_product_id_fkey FOREIGN KEY (product_id)
        REFERENCES public.product_product (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT stock_move_line_product_uom_id_fkey FOREIGN KEY (product_uom_id)
        REFERENCES public.uom_uom (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_line_result_package_id_fkey FOREIGN KEY (result_package_id)
        REFERENCES public.stock_quant_package (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_move_line_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.stock_move_line
    OWNER to flectra;

COMMENT ON TABLE public.stock_move_line
    IS 'Product Moves (Stock Move Line)';

COMMENT ON COLUMN public.stock_move_line.picking_id
    IS 'Transfer';

COMMENT ON COLUMN public.stock_move_line.move_id
    IS 'Stock Move';

COMMENT ON COLUMN public.stock_move_line.company_id
    IS 'Company';

COMMENT ON COLUMN public.stock_move_line.product_id
    IS 'Product';

COMMENT ON COLUMN public.stock_move_line.product_uom_id
    IS 'Unit of Measure';

COMMENT ON COLUMN public.stock_move_line.product_qty
    IS 'Real Reserved Quantity';

COMMENT ON COLUMN public.stock_move_line.product_uom_qty
    IS 'Reserved';

COMMENT ON COLUMN public.stock_move_line.qty_done
    IS 'Done';

COMMENT ON COLUMN public.stock_move_line.package_id
    IS 'Source Package';

COMMENT ON COLUMN public.stock_move_line.package_level_id
    IS 'Package Level';

COMMENT ON COLUMN public.stock_move_line.lot_id
    IS 'Lot/Serial Number';

COMMENT ON COLUMN public.stock_move_line.lot_name
    IS 'Lot/Serial Number Name';

COMMENT ON COLUMN public.stock_move_line.result_package_id
    IS 'Destination Package';

COMMENT ON COLUMN public.stock_move_line.date
    IS 'Date';

COMMENT ON COLUMN public.stock_move_line.owner_id
    IS 'From Owner';

COMMENT ON COLUMN public.stock_move_line.location_id
    IS 'From';

COMMENT ON COLUMN public.stock_move_line.location_dest_id
    IS 'To';

COMMENT ON COLUMN public.stock_move_line.state
    IS 'Status';

COMMENT ON COLUMN public.stock_move_line.reference
    IS 'Reference';

COMMENT ON COLUMN public.stock_move_line.description_picking
    IS 'Description picking';

COMMENT ON COLUMN public.stock_move_line.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.stock_move_line.create_date
    IS 'Created on';

COMMENT ON COLUMN public.stock_move_line.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.stock_move_line.write_date
    IS 'Last Updated on';
-- Index: stock_move_line_company_id_index

-- DROP INDEX public.stock_move_line_company_id_index;

CREATE INDEX stock_move_line_company_id_index
    ON public.stock_move_line USING btree
    (company_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_line_free_reservation_index

-- DROP INDEX public.stock_move_line_free_reservation_index;

CREATE INDEX stock_move_line_free_reservation_index
    ON public.stock_move_line USING btree
    (id ASC NULLS LAST, company_id ASC NULLS LAST, product_id ASC NULLS LAST, lot_id ASC NULLS LAST, location_id ASC NULLS LAST, owner_id ASC NULLS LAST, package_id ASC NULLS LAST)
    TABLESPACE pg_default
    WHERE (state IS NULL OR (state::text <> ALL (ARRAY['cancel'::character varying, 'done'::character varying]::text[]))) AND product_qty > 0::numeric;
-- Index: stock_move_line_move_id_index

-- DROP INDEX public.stock_move_line_move_id_index;

CREATE INDEX stock_move_line_move_id_index
    ON public.stock_move_line USING btree
    (move_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_move_line_picking_id_index

-- DROP INDEX public.stock_move_line_picking_id_index;

CREATE INDEX stock_move_line_picking_id_index
    ON public.stock_move_line USING btree
    (picking_id ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.stock_picking

-- DROP TABLE public.stock_picking;

CREATE TABLE IF NOT EXISTS public.stock_picking
(
    id integer NOT NULL DEFAULT nextval('stock_picking_id_seq'::regclass),
    message_main_attachment_id integer,
    name character varying COLLATE pg_catalog."default",
    origin character varying COLLATE pg_catalog."default",
    note text COLLATE pg_catalog."default",
    backorder_id integer,
    move_type character varying COLLATE pg_catalog."default" NOT NULL,
    state character varying COLLATE pg_catalog."default",
    group_id integer,
    priority character varying COLLATE pg_catalog."default",
    scheduled_date timestamp without time zone,
    date_deadline timestamp without time zone,
    has_deadline_issue boolean,
    date timestamp without time zone,
    date_done timestamp without time zone,
    location_id integer NOT NULL,
    location_dest_id integer NOT NULL,
    picking_type_id integer NOT NULL,
    partner_id integer,
    company_id integer,
    user_id integer,
    owner_id integer,
    printed boolean,
    is_locked boolean,
    immediate_transfer boolean,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT stock_picking_pkey PRIMARY KEY (id),
    CONSTRAINT stock_picking_name_uniq UNIQUE (name, company_id),
    CONSTRAINT stock_picking_backorder_id_fkey FOREIGN KEY (backorder_id)
        REFERENCES public.stock_picking (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_group_id_fkey FOREIGN KEY (group_id)
        REFERENCES public.procurement_group (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_location_dest_id_fkey FOREIGN KEY (location_dest_id)
        REFERENCES public.stock_location (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_picking_location_id_fkey FOREIGN KEY (location_id)
        REFERENCES public.stock_location (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_picking_message_main_attachment_id_fkey FOREIGN KEY (message_main_attachment_id)
        REFERENCES public.ir_attachment (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_owner_id_fkey FOREIGN KEY (owner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_partner_id_fkey FOREIGN KEY (partner_id)
        REFERENCES public.res_partner (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_picking_type_id_fkey FOREIGN KEY (picking_type_id)
        REFERENCES public.stock_picking_type (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_picking_user_id_fkey FOREIGN KEY (user_id)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.stock_picking
    OWNER to flectra;

COMMENT ON TABLE public.stock_picking
    IS 'Transfer';

COMMENT ON COLUMN public.stock_picking.message_main_attachment_id
    IS 'Main Attachment';

COMMENT ON COLUMN public.stock_picking.name
    IS 'Reference';

COMMENT ON COLUMN public.stock_picking.origin
    IS 'Source Document';

COMMENT ON COLUMN public.stock_picking.note
    IS 'Notes';

COMMENT ON COLUMN public.stock_picking.backorder_id
    IS 'Back Order of';

COMMENT ON COLUMN public.stock_picking.move_type
    IS 'Shipping Policy';

COMMENT ON COLUMN public.stock_picking.state
    IS 'Status';

COMMENT ON COLUMN public.stock_picking.group_id
    IS 'Procurement Group';

COMMENT ON COLUMN public.stock_picking.priority
    IS 'Priority';

COMMENT ON COLUMN public.stock_picking.scheduled_date
    IS 'Scheduled Date';

COMMENT ON COLUMN public.stock_picking.date_deadline
    IS 'Deadline';

COMMENT ON COLUMN public.stock_picking.has_deadline_issue
    IS 'Is late';

COMMENT ON COLUMN public.stock_picking.date
    IS 'Creation Date';

COMMENT ON COLUMN public.stock_picking.date_done
    IS 'Date of Transfer';

COMMENT ON COLUMN public.stock_picking.location_id
    IS 'Source Location';

COMMENT ON COLUMN public.stock_picking.location_dest_id
    IS 'Destination Location';

COMMENT ON COLUMN public.stock_picking.picking_type_id
    IS 'Operation Type';

COMMENT ON COLUMN public.stock_picking.partner_id
    IS 'Contact';

COMMENT ON COLUMN public.stock_picking.company_id
    IS 'Company';

COMMENT ON COLUMN public.stock_picking.user_id
    IS 'Responsible';

COMMENT ON COLUMN public.stock_picking.owner_id
    IS 'Assign Owner';

COMMENT ON COLUMN public.stock_picking.printed
    IS 'Printed';

COMMENT ON COLUMN public.stock_picking.is_locked
    IS 'Is Locked';

COMMENT ON COLUMN public.stock_picking.immediate_transfer
    IS 'Immediate Transfer';

COMMENT ON COLUMN public.stock_picking.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.stock_picking.create_date
    IS 'Created on';

COMMENT ON COLUMN public.stock_picking.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.stock_picking.write_date
    IS 'Last Updated on';

COMMENT ON CONSTRAINT stock_picking_name_uniq ON public.stock_picking
    IS 'unique(name, company_id)';
-- Index: stock_picking_backorder_id_index

-- DROP INDEX public.stock_picking_backorder_id_index;

CREATE INDEX stock_picking_backorder_id_index
    ON public.stock_picking USING btree
    (backorder_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_picking_company_id_index

-- DROP INDEX public.stock_picking_company_id_index;

CREATE INDEX stock_picking_company_id_index
    ON public.stock_picking USING btree
    (company_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_picking_date_index

-- DROP INDEX public.stock_picking_date_index;

CREATE INDEX stock_picking_date_index
    ON public.stock_picking USING btree
    (date ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_picking_message_main_attachment_id_index

-- DROP INDEX public.stock_picking_message_main_attachment_id_index;

CREATE INDEX stock_picking_message_main_attachment_id_index
    ON public.stock_picking USING btree
    (message_main_attachment_id ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_picking_name_index

-- DROP INDEX public.stock_picking_name_index;

CREATE INDEX stock_picking_name_index
    ON public.stock_picking USING btree
    (name COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_picking_origin_index

-- DROP INDEX public.stock_picking_origin_index;

CREATE INDEX stock_picking_origin_index
    ON public.stock_picking USING btree
    (origin COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_picking_priority_index

-- DROP INDEX public.stock_picking_priority_index;

CREATE INDEX stock_picking_priority_index
    ON public.stock_picking USING btree
    (priority COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_picking_scheduled_date_index

-- DROP INDEX public.stock_picking_scheduled_date_index;

CREATE INDEX stock_picking_scheduled_date_index
    ON public.stock_picking USING btree
    (scheduled_date ASC NULLS LAST)
    TABLESPACE pg_default;
-- Index: stock_picking_state_index

-- DROP INDEX public.stock_picking_state_index;

CREATE INDEX stock_picking_state_index
    ON public.stock_picking USING btree
    (state COLLATE pg_catalog."default" ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.stock_picking_type

-- DROP TABLE public.stock_picking_type;

CREATE TABLE IF NOT EXISTS public.stock_picking_type
(
    id integer NOT NULL DEFAULT nextval('stock_picking_type_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    color integer,
    sequence integer,
    sequence_id integer,
    sequence_code character varying COLLATE pg_catalog."default" NOT NULL,
    default_location_src_id integer,
    default_location_dest_id integer,
    code character varying COLLATE pg_catalog."default" NOT NULL,
    return_picking_type_id integer,
    show_entire_packs boolean,
    warehouse_id integer,
    active boolean,
    use_create_lots boolean,
    use_existing_lots boolean,
    show_operations boolean,
    show_reserved boolean,
    barcode character varying COLLATE pg_catalog."default",
    company_id integer NOT NULL,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT stock_picking_type_pkey PRIMARY KEY (id),
    CONSTRAINT stock_picking_type_company_id_fkey FOREIGN KEY (company_id)
        REFERENCES public.res_company (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE RESTRICT,
    CONSTRAINT stock_picking_type_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_type_default_location_dest_id_fkey FOREIGN KEY (default_location_dest_id)
        REFERENCES public.stock_location (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_type_default_location_src_id_fkey FOREIGN KEY (default_location_src_id)
        REFERENCES public.stock_location (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_type_return_picking_type_id_fkey FOREIGN KEY (return_picking_type_id)
        REFERENCES public.stock_picking_type (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_type_sequence_id_fkey FOREIGN KEY (sequence_id)
        REFERENCES public.ir_sequence (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT stock_picking_type_warehouse_id_fkey FOREIGN KEY (warehouse_id)
        REFERENCES public.stock_warehouse (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT stock_picking_type_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.stock_picking_type
    OWNER to flectra;

COMMENT ON TABLE public.stock_picking_type
    IS 'Picking Type';

COMMENT ON COLUMN public.stock_picking_type.name
    IS 'Operation Type';

COMMENT ON COLUMN public.stock_picking_type.color
    IS 'Color';

COMMENT ON COLUMN public.stock_picking_type.sequence
    IS 'Sequence';

COMMENT ON COLUMN public.stock_picking_type.sequence_id
    IS 'Reference Sequence';

COMMENT ON COLUMN public.stock_picking_type.sequence_code
    IS 'Code';

COMMENT ON COLUMN public.stock_picking_type.default_location_src_id
    IS 'Default Source Location';

COMMENT ON COLUMN public.stock_picking_type.default_location_dest_id
    IS 'Default Destination Location';

COMMENT ON COLUMN public.stock_picking_type.code
    IS 'Type of Operation';

COMMENT ON COLUMN public.stock_picking_type.return_picking_type_id
    IS 'Operation Type for Returns';

COMMENT ON COLUMN public.stock_picking_type.show_entire_packs
    IS 'Move Entire Packages';

COMMENT ON COLUMN public.stock_picking_type.warehouse_id
    IS 'Warehouse';

COMMENT ON COLUMN public.stock_picking_type.active
    IS 'Active';

COMMENT ON COLUMN public.stock_picking_type.use_create_lots
    IS 'Create New Lots/Serial Numbers';

COMMENT ON COLUMN public.stock_picking_type.use_existing_lots
    IS 'Use Existing Lots/Serial Numbers';

COMMENT ON COLUMN public.stock_picking_type.show_operations
    IS 'Show Detailed Operations';

COMMENT ON COLUMN public.stock_picking_type.show_reserved
    IS 'Pre-fill Detailed Operations';

COMMENT ON COLUMN public.stock_picking_type.barcode
    IS 'Barcode';

COMMENT ON COLUMN public.stock_picking_type.company_id
    IS 'Company';

COMMENT ON COLUMN public.stock_picking_type.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.stock_picking_type.create_date
    IS 'Created on';

COMMENT ON COLUMN public.stock_picking_type.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.stock_picking_type.write_date
    IS 'Last Updated on';
-- Index: stock_picking_type_company_id_index

-- DROP INDEX public.stock_picking_type_company_id_index;

CREATE INDEX stock_picking_type_company_id_index
    ON public.stock_picking_type USING btree
    (company_id ASC NULLS LAST)
    TABLESPACE pg_default;

-- Table: public.uom_category

-- DROP TABLE public.uom_category;

CREATE TABLE IF NOT EXISTS public.uom_category
(
    id integer NOT NULL DEFAULT nextval('uom_category_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT uom_category_pkey PRIMARY KEY (id),
    CONSTRAINT uom_category_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT uom_category_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.uom_category
    OWNER to flectra;

COMMENT ON TABLE public.uom_category
    IS 'Product UoM Categories';

COMMENT ON COLUMN public.uom_category.name
    IS 'Unit of Measure Category';

COMMENT ON COLUMN public.uom_category.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.uom_category.create_date
    IS 'Created on';

COMMENT ON COLUMN public.uom_category.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.uom_category.write_date
    IS 'Last Updated on';

-- Table: public.uom_uom

-- DROP TABLE public.uom_uom;

CREATE TABLE IF NOT EXISTS public.uom_uom
(
    id integer NOT NULL DEFAULT nextval('uom_uom_id_seq'::regclass),
    name character varying COLLATE pg_catalog."default" NOT NULL,
    category_id integer NOT NULL,
    factor numeric NOT NULL,
    rounding numeric NOT NULL,
    active boolean,
    uom_type character varying COLLATE pg_catalog."default" NOT NULL,
    create_uid integer,
    create_date timestamp without time zone,
    write_uid integer,
    write_date timestamp without time zone,
    CONSTRAINT uom_uom_pkey PRIMARY KEY (id),
    CONSTRAINT uom_uom_category_id_fkey FOREIGN KEY (category_id)
        REFERENCES public.uom_category (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT uom_uom_create_uid_fkey FOREIGN KEY (create_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT uom_uom_write_uid_fkey FOREIGN KEY (write_uid)
        REFERENCES public.res_users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE SET NULL,
    CONSTRAINT uom_uom_factor_gt_zero CHECK (factor <> 0::numeric),
    CONSTRAINT uom_uom_factor_reference_is_one CHECK (uom_type::text = 'reference'::text AND factor = 1.0 OR uom_type::text <> 'reference'::text),
    CONSTRAINT uom_uom_rounding_gt_zero CHECK (rounding > 0::numeric)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.uom_uom
    OWNER to flectra;

COMMENT ON TABLE public.uom_uom
    IS 'Product Unit of Measure';

COMMENT ON COLUMN public.uom_uom.name
    IS 'Unit of Measure';

COMMENT ON COLUMN public.uom_uom.category_id
    IS 'Category';

COMMENT ON COLUMN public.uom_uom.factor
    IS 'Ratio';

COMMENT ON COLUMN public.uom_uom.rounding
    IS 'Rounding Precision';

COMMENT ON COLUMN public.uom_uom.active
    IS 'Active';

COMMENT ON COLUMN public.uom_uom.uom_type
    IS 'Type';

COMMENT ON COLUMN public.uom_uom.create_uid
    IS 'Created by';

COMMENT ON COLUMN public.uom_uom.create_date
    IS 'Created on';

COMMENT ON COLUMN public.uom_uom.write_uid
    IS 'Last Updated by';

COMMENT ON COLUMN public.uom_uom.write_date
    IS 'Last Updated on';

COMMENT ON CONSTRAINT uom_uom_factor_gt_zero ON public.uom_uom
    IS 'CHECK (factor!=0)';
COMMENT ON CONSTRAINT uom_uom_factor_reference_is_one ON public.uom_uom
    IS 'CHECK((uom_type = ''reference'' AND factor = 1.0) OR (uom_type != ''reference''))';
COMMENT ON CONSTRAINT uom_uom_rounding_gt_zero ON public.uom_uom
    IS 'CHECK (rounding>0)';    