<% php %>
    $__generated_options = \SQL2::validate([
        'tenant_id' => ['required' => true, 'domain' => 'tenant_id'],
        'code_prefix' => ['required' => true, 'domain' => 'code'],
    ], $__generated_options);
    extract($__generated_options, EXTR_OVERWRITE);
<% end php %>

DO $$
DECLARE tenant_id INTEGER = <% int $tenant_id %>;
DECLARE code_prefix VARCHAR = '<% string $code_prefix %>';
DECLARE total_groups INTEGER;
BEGIN
    SELECT COUNT(au_group_id)
    INTO total_groups
    FROM au_groups
    WHERE au_group_tenant_id = tenant_id
        AND au_group_code LIKE code_prefix;

    IF total_groups = 0 THEN
        RAISE NOTICE 'The number of groups is zero';
        RETURN;
    END IF;

    RAISE NOTICE 'The number of groups: %', total_groups;

<% php %>
    $tables = [
        ['au_contact_groups', 'au_contgrp_tenant_id', 'au_contgrp_au_group_id'],
        ['au_audience_groups', 'au_audgrp_tenant_id', 'au_audgrp_au_group_id'],
        ['au_segment_groups', 'au_seggrp_tenant_id', 'au_seggrp_au_group_id'],

        ['au_groups', 'au_group_tenant_id', 'au_group_id'],
    ];
<% end php %>

<% foreach ($tables as $k => $v) %>

    DELETE FROM <% string $v[0] %>
    WHERE <% string $v[1] %> = tenant_id
        AND <% string $v[2] %> IN (
            SELECT au_group_id
            FROM au_groups
            WHERE au_group_tenant_id = tenant_id
                AND au_group_code LIKE code_prefix
        );

<% end foreach %>

END $$;
